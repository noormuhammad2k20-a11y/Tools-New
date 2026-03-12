document.addEventListener('DOMContentLoaded', () => {
    if (window.CURRENT_TOOL_SLUG !== 'pdf-to-excel') return;

    const form = document.querySelector('form');
    if (!form) return;

    const fileInput = form.querySelector('input[type="file"]');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        e.stopImmediatePropagation(); // Prevent main tool.js AJAX submission

        const file = fileInput.files[0];
        if (!file) {
            showToast('Please select a PDF file first.', 'error');
            return;
        }

        const btnText = submitBtn.innerHTML;
        submitBtn.innerHTML = 'Reading PDF...';
        submitBtn.disabled = true;

        try {
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;

            let masterArray = [];

            submitBtn.innerHTML = 'Extracting Text... (This may take a moment)';

            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();

                // Group by Y
                let rowsMap = new Map();
                const TOLERANCE = 3; // +/- 3px tolerance for lines

                textContent.items.forEach(item => {
                    const y = Math.round(item.transform[5]); // Y coordinate
                    const x = Math.round(item.transform[4]); // X coordinate
                    const text = item.str.trim();

                    if (!text) return; // skip empty text items

                    // Find if there is a row within tolerance
                    let matchedY = null;
                    for (let existingY of rowsMap.keys()) {
                        if (Math.abs(existingY - y) <= TOLERANCE) {
                            matchedY = existingY;
                            break;
                        }
                    }

                    if (matchedY === null) {
                        matchedY = y;
                        rowsMap.set(matchedY, []);
                    }

                    rowsMap.get(matchedY).push({ x, text });
                });

                // Sort the Y coordinates descending since PDF origin is bottom-left
                let sortedY = Array.from(rowsMap.keys()).sort((a, b) => b - a);

                sortedY.forEach(y => {
                    let rowItems = rowsMap.get(y);
                    // sort by X ascending (left to right)
                    rowItems.sort((a, b) => a.x - b.x);

                    let rowArray = rowItems.map(item => item.text);
                    masterArray.push(rowArray);
                });

                // Add a blank row between pages to separate data logically
                if (pageNum < pdf.numPages) {
                    masterArray.push([]);
                }
            }

            submitBtn.innerHTML = 'Generating Excel...';

            // Create workbook and worksheet using SheetJS
            const ws = XLSX.utils.aoa_to_sheet(masterArray);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Extracted Data");

            // Trigger Download
            XLSX.writeFile(wb, "converted_document.xlsx");

            if (typeof window.showToast === 'function') {
                showToast('PDF successfully converted to Excel!', 'success');
            } else {
                alert('Success! Your Excel file has been downloaded.');
            }
        } catch (err) {
            console.error('PDF to Excel extraction failed:', err);
            if (typeof window.showToast === 'function') {
                showToast('An error occurred during extraction. Check console.', 'error');
            } else {
                alert('Conversion failed.');
            }
        } finally {
            submitBtn.innerHTML = btnText;
            submitBtn.disabled = false;
        }
    });
});
