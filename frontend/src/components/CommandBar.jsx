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
      <button 
        onClick={() => setIsOpen(true)}
        className="fixed top-6 right-6 flex items-center gap-3 px-4 py-2 bg-white border border-slate-200 rounded-lg text-slate-400 hover:border-slate-300 transition-all z-40 group shadow-sm"
      >
        <Search className="w-4 h-4 group-hover:text-slate-600 transition-colors" />
        <span className="text-xs font-bold uppercase tracking-widest hidden md:inline">Quick Search</span>
        <div className="flex items-center gap-1 px-1.5 py-0.5 bg-slate-50 border border-slate-100 rounded text-[10px] font-bold">
          <Command className="w-2.5 h-2.5" /> K
        </div>
      </button>

      <AnimatePresence>
        {isOpen && (
          <div className="fixed inset-0 z-[100] flex items-start justify-center pt-[15vh] px-4">
            <motion.div 
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              onClick={() => setIsOpen(false)}
              className="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"
            />
            
            <motion.div 
              initial={{ opacity: 0, scale: 0.95, y: -20 }}
              animate={{ opacity: 1, scale: 1, y: 0 }}
              exit={{ opacity: 0, scale: 0.95, y: -20 }}
              className="relative w-full max-w-xl bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden"
            >
              <div className="flex items-center px-4 py-3 border-b border-slate-100">
                <Search className="w-5 h-5 text-slate-400 mr-3" strokeWidth={1.5} />
                <input 
                  autoFocus
                  placeholder="Type to search tools..."
                  className="flex-1 bg-transparent border-none outline-none text-slate-900 text-sm font-medium placeholder:text-slate-300"
                  value={query}
                  onChange={(e) => setQuery(e.target.value)}
                />
                <button 
                  onClick={() => setIsOpen(false)}
                  className="p-1 rounded-md hover:bg-slate-50 text-slate-400"
                >
                  <X className="w-4 h-4" />
                </button>
              </div>

              <div className="p-2 max-h-[400px] overflow-auto">
                {filteredTools.length > 0 ? (
                  <div className="space-y-1">
                    <p className="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tools Found</p>
                    {filteredTools.map((tool) => (
                      <button
                        key={tool.slug}
                        onClick={() => handleSelect(tool.slug)}
                        className="w-full flex items-center justify-between px-3 py-3 rounded-lg hover:bg-slate-50 transition-colors group text-left"
                      >
                        <div className="flex items-center gap-3">
                          <div className="p-2 rounded bg-slate-100 text-slate-400 group-hover:text-primary transition-colors">
                            <FileText className="w-4 h-4" strokeWidth={1.5} />
                          </div>
                          <div>
                            <p className="text-sm font-bold text-slate-900">{tool.title}</p>
                            <p className="text-xs text-slate-400 line-clamp-1">{tool.desc}</p>
                          </div>
                        </div>
                        <ArrowRight className="w-4 h-4 text-slate-300 opacity-0 group-hover:opacity-100 transition-all mr-2" />
                      </button>
                    ))}
                  </div>
                ) : query.trim() !== "" ? (
                   <div className="py-12 text-center">
                      <Search className="w-10 h-10 text-slate-100 mx-auto mb-4" strokeWidth={1} />
                      <p className="text-sm font-bold text-slate-900 uppercase tracking-wide">No tools found</p>
                      <p className="text-xs text-slate-400 mt-1">Try another keyword</p>
                   </div>
                ) : (
                  <div className="py-12 text-center">
                    <Command className="w-10 h-10 text-slate-100 mx-auto mb-4" strokeWidth={1} />
                    <p className="text-sm font-bold text-slate-900 uppercase tracking-wide">Start typing to search</p>
                    <p className="text-xs text-slate-400 mt-1">Find the right tool for your task</p>
                  </div>
                )}
              </div>

              <div className="px-4 py-2 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div className="flex items-center gap-4">
                   <div className="flex items-center gap-1 text-[10px] font-bold text-slate-400">
                     <span className="p-0.5 border border-slate-200 rounded bg-white px-1">ESC</span> to close
                   </div>
                   <div className="flex items-center gap-1 text-[10px] font-bold text-slate-400">
                     <span className="p-0.5 border border-slate-200 rounded bg-white px-1">ENTER</span> to select
                   </div>
                </div>
                <div className="text-[10px] font-bold text-slate-300">
                  POWERED BY TOOLMASTER
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
