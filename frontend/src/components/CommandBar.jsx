import { useState, useEffect, useCallback } from "react";
import { useNavigate } from "react-router-dom";
import { Search, Command, X, ArrowRight, FileText } from "lucide-react";
import { motion, AnimatePresence } from "framer-motion";
import { cn } from "../lib/utils";

const CommandBar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [query, setQuery] = useState("");
  const [tools, setTools] = useState([]);
  const [filteredTools, setFilteredTools] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    fetchTools();
    const handleKeyDown = (e) => {
      if (e.key === "k" && (e.metaKey || e.ctrlKey)) {
        e.preventDefault();
        setIsOpen((prev) => !prev);
      }
      if (e.key === "Escape") {
        setIsOpen(false);
      }
    };
    window.addEventListener("keydown", handleKeyDown);
    return () => window.removeEventListener("keydown", handleKeyDown);
  }, []);

  const fetchTools = async () => {
    try {
      const response = await fetch('/Tools%20New/api/list_tools.php');
      const data = await response.json();
      if (data.status === 'success') {
        const toolsArray = Object.entries(data.tools).map(([slug, val]) => ({ slug, ...val }));
        setTools(toolsArray);
      }
    } catch (err) {
      console.error("Failed to fetch tools for search", err);
    }
  };

  useEffect(() => {
    if (query.trim() === "") {
      setFilteredTools([]);
      return;
    }
    const filtered = tools.filter(tool => 
      tool.title.toLowerCase().includes(query.toLowerCase()) || 
      tool.desc.toLowerCase().includes(query.toLowerCase())
    ).slice(0, 5);
    setFilteredTools(filtered);
  }, [query, tools]);

  const handleSelect = (slug) => {
    navigate(`/tool/${slug}`);
    setIsOpen(false);
    setQuery("");
  };

  return (
    <>
      {/* Search trigger button removed as it's now in Navbar.jsx */}

      <AnimatePresence>
        {isOpen && (
          <div className="fixed inset-0 z-[100] flex items-start justify-center pt-[15vh] px-4">
            <motion.div 
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              onClick={() => setIsOpen(false)}
              className="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm"
            />
            
            <motion.div 
              initial={{ opacity: 0, scale: 0.98, y: -10 }}
              animate={{ opacity: 1, scale: 1, y: 0 }}
              exit={{ opacity: 0, scale: 0.98, y: -10 }}
              className="relative w-full max-w-xl bg-white rounded-xl shadow-2xl border border-zinc-200 overflow-hidden"
            >
              <div className="flex items-center px-5 py-4 border-b border-zinc-100">
                <Search className="w-5 h-5 text-zinc-400 mr-4" strokeWidth={2} />
                <input 
                  autoFocus
                  placeholder="Infrastructure search..."
                  className="flex-1 bg-transparent border-none outline-none text-zinc-900 text-sm font-bold placeholder:text-zinc-300"
                  value={query}
                  onChange={(e) => setQuery(e.target.value)}
                />
                <button 
                  onClick={() => setIsOpen(false)}
                  className="p-1 px-1.5 border border-zinc-200 rounded hover:bg-zinc-50 text-zinc-400 font-bold text-[10px] uppercase tracking-widest transition-colors"
                >
                  ESC
                </button>
              </div>

              <div className="p-2 max-h-[420px] overflow-auto bg-white">
                {filteredTools.length > 0 ? (
                  <div className="space-y-1">
                    <p className="px-4 py-3 text-[9px] font-bold text-zinc-400 uppercase tracking-[0.25em]">Validated Resources</p>
                    {filteredTools.map((tool) => (
                      <button
                        key={tool.slug}
                        onClick={() => handleSelect(tool.slug)}
                        className="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-zinc-50 transition-all group text-left border border-transparent hover:border-zinc-100"
                      >
                        <div className="flex items-center gap-4">
                          <div className="p-2.5 rounded bg-zinc-50 text-zinc-400 group-hover:text-zinc-900 group-hover:bg-zinc-100 transition-all border border-zinc-100">
                            <FileText className="w-4 h-4" />
                          </div>
                          <div>
                            <p className="text-sm font-bold text-zinc-900 leading-tight">{tool.title}</p>
                            <p className="text-[11px] text-zinc-400 font-medium line-clamp-1 mt-1 uppercase tracking-wider">{tool.category.replace(/-/g, ' ')}</p>
                          </div>
                        </div>
                        <ArrowRight className="w-4 h-4 text-zinc-200 group-hover:text-zinc-900 group-hover:translate-x-1 transition-all" />
                      </button>
                    ))}
                  </div>
                ) : query.trim() !== "" ? (
                   <div className="py-20 text-center">
                      <Search className="w-12 h-12 text-zinc-100 mx-auto mb-4" strokeWidth={1} />
                      <p className="text-xs font-bold text-zinc-900 uppercase tracking-widest">No matching nodes</p>
                      <p className="text-[10px] text-zinc-400 mt-2 uppercase font-bold tracking-widest">Awaiting valid query</p>
                   </div>
                ) : (
                  <div className="py-20 text-center">
                    <Command className="w-12 h-12 text-zinc-100 mx-auto mb-4" strokeWidth={1} />
                    <p className="text-xs font-bold text-zinc-900 uppercase tracking-widest">System Search</p>
                    <p className="text-[10px] text-zinc-400 mt-2 uppercase font-bold tracking-widest">Input identifier to locate resource</p>
                  </div>
                )}
              </div>

              <div className="px-5 py-3 bg-zinc-50 border-t border-zinc-100 flex items-center justify-between">
                <div className="flex items-center gap-6">
                   <div className="flex items-center gap-2 text-[9px] font-bold text-zinc-400 uppercase tracking-widest">
                     <span className="p-1 px-1.5 border border-zinc-200 rounded bg-white">ENTER</span> Select
                   </div>
                   <div className="flex items-center gap-2 text-[9px] font-bold text-zinc-400 uppercase tracking-widest">
                     <span className="p-1 px-1.5 border border-zinc-200 rounded bg-white">ESC</span> Close
                   </div>
                </div>
                <div className="text-[9px] font-bold text-zinc-300 uppercase tracking-[0.2em]">
                  NODE_ID: ARCH_SEARCH_V2
                </div>
              </div>
            </motion.div>
          </div>
        )}
      </AnimatePresence>
    </>
  );
};

export default CommandBar;
