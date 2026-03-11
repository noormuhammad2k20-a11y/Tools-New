import { useState, useEffect } from "react";
import { useParams, Link } from "react-router-dom";
import { motion, AnimatePresence } from "framer-motion";
import { 
  Type, 
  Code, 
  Calculator, 
  Shield, 
  Image as ImageIcon, 
  Zap, 
  Binary, 
  Globe, 
  FileText,
  ChevronRight, 
  Loader2, 
  Download, 
  Copy, 
  RefreshCw, 
  Check, 
  Trash2,
  Terminal,
  ChevronLeft,
  Sparkles,
  ArrowRight
} from "lucide-react";
import { cn } from "../lib/utils";
import SEOArticle from "../components/SEOArticle";
import FAQSection from "../components/FAQSection";
import ToolCard from "../components/ToolCard";
import ToolFeatures from "../components/ToolFeatures";

import { executeToolLocally, isToolFrontendReady } from "../lib/toolEngine";

const ToolPage = () => {
  const { slug } = useParams();
  const [tool, setTool] = useState(null);
  const [loading, setLoading] = useState(true);
  const [processing, setProcessing] = useState(false);
  const [result, setResult] = useState(null);
  const [error, setError] = useState(null);
  const [relatedTools, setRelatedTools] = useState([]);
  const [copied, setCopied] = useState(false);

  useEffect(() => {
    const fetchToolDetails = async () => {
      setLoading(true);
      setResult(null);
      setError(null);
      try {
        const response = await fetch('/Tools%20New/api/list_tools.php');
        const data = await response.json();
        if (data.status === 'success' && data.tools[slug]) {
          const currentTool = data.tools[slug];
          setTool({ ...currentTool, slug });
          
          const allTools = Object.entries(data.tools).map(([key, val]) => ({ slug: key, ...val }));
          const related = allTools.filter(t => t.category === currentTool.category && t.slug !== slug).slice(0, 4);
          setRelatedTools(related);
        } else {
          setError("Tool not found");
        }
      } catch (err) {
        setError("Failed to load tool details");
      } finally {
        setLoading(false);
      }
    };

    fetchToolDetails();
    window.scrollTo(0, 0);
  }, [slug]);

  // Real-time processing for specific tools
  useEffect(() => {
    if (isToolFrontendReady(slug) && tool && tool.inputs && tool.inputs.some(i => i.type === 'textarea')) {
      const form = document.getElementById("toolForm");
      if (!form) return;

      const handleInput = async () => {
        const formData = new FormData(form);
        const hasValue = Array.from(formData.values()).some(v => v && v.toString().trim() !== "");
        
        if (hasValue) {
          try {
            const localResult = await executeToolLocally(slug, formData);
            if (localResult) setResult(localResult);
          } catch (err) {
            console.error("Local processing error:", err);
          }
        } else {
          setResult(null);
        }
      };

      form.addEventListener('input', handleInput);
      return () => form.removeEventListener('input', handleInput);
    }
  }, [slug, tool]);

  const handleSubmit = async (e) => {
    if (e) e.preventDefault();
    setProcessing(true);
    setError(null);
    setResult(null);

    const form = e ? e.target : document.getElementById("toolForm");
    const formData = new FormData(form);

    try {
      if (isToolFrontendReady(slug)) {
        const localResult = await executeToolLocally(slug, formData);
        setResult(localResult);
      } else {
        const response = await fetch(window.location.href, {
          method: 'POST',
          body: formData,
        });

        const contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
          const data = await response.json();
          if (data.status === 'error') {
            setError(data.message);
          } else {
            setResult(data);
          }
        } else {
          const text = await response.text();
          setResult(text);
        }
      }
    } catch (err) {
      setError(err.message || "Execution failed. Please check input parameters.");
    } finally {
      setTimeout(() => setProcessing(false), 200);
    }
  };

  const handleCopy = () => {
    if (!result) return;
    const textToCopy = typeof result === 'string' ? result : JSON.stringify(result, null, 2);
    const cleanText = textToCopy.replace(/<[^>]*>/g, '');
    navigator.clipboard.writeText(cleanText);
    setCopied(true);
    setTimeout(() => setCopied(false), 2000);
  };

  if (loading) {
    return (
      <div className="flex flex-col items-center justify-center min-h-[60vh] gap-4 bg-white">
        <Loader2 className="w-6 h-6 text-zinc-300 animate-spin" strokeWidth={2} />
        <div className="text-[10px] font-medium text-zinc-400 uppercase tracking-[0.2em]">Initialising Component...</div>
      </div>
    );
  }

  if (error && !tool) {
    return (
      <div className="min-h-screen flex flex-col items-center justify-center p-6 text-center bg-white">
        <Terminal className="w-12 h-12 text-zinc-200 mb-6" strokeWidth={1} />
        <h2 className="text-xl font-bold text-zinc-900 tracking-tight mb-2">Resource Error</h2>
        <p className="text-zinc-500 mb-8 max-w-xs text-sm">{error}</p>
        <Link to="/" className="px-6 py-2.5 bg-zinc-900 text-white text-sm font-semibold rounded-md hover:bg-zinc-800 transition-colors">
          Return to Dashboard
        </Link>
      </div>
    );
  }

  return (
    <div className="bg-white">
      {/* Tool Header */}
      <header className="bg-white border-b border-zinc-200 py-16 px-8 md:px-12">
        <div className="max-w-5xl">
          <div className="flex items-center gap-2 mb-8">
            <Link to="/" className="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em] hover:text-zinc-900 transition-colors">Infrastructure</Link>
            <ChevronRight className="w-3 h-3 text-zinc-300" />
            <span className="text-[10px] font-bold text-zinc-900 uppercase tracking-[0.2em] px-2 py-0.5 bg-zinc-100 rounded">{tool.category.replace(/-/g, ' ')}</span>
          </div>
          
          <div className="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
            <div className="max-w-2xl text-left">
              <h1 className="text-3xl md:text-4xl font-bold text-zinc-900 tracking-tight mb-4">
                {tool.title}
              </h1>
              <p className="text-zinc-500 text-base md:text-lg leading-relaxed max-w-xl font-medium">
                {tool.desc}
              </p>
            </div>
            
            <div className="flex items-center gap-8 pb-1">
              <div className="text-left">
                <p className="text-[9px] font-bold text-zinc-400 uppercase tracking-widest mb-1.5 leading-none">Kernel Version</p>
                <p className="text-xs font-bold text-zinc-900 leading-none tracking-tight">V2.4 Stable</p>
              </div>
              <div className="w-px h-8 bg-zinc-200" />
              <div className="text-left">
                <p className="text-[9px] font-bold text-zinc-400 uppercase tracking-widest mb-1.5 leading-none">Security Protocol</p>
                <div className="flex items-center gap-2 leading-none">
                  <div className="w-1.5 h-1.5 rounded-full bg-emerald-500" />
                  <p className="text-xs font-bold text-zinc-900 tracking-tight">Isolated</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      {/* Workspace Area */}
      <main className="px-8 md:px-12 py-16">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
          
          {/* Input Module */}
          <section className="bg-white border border-zinc-200 rounded-xl overflow-hidden flex flex-col shadow-sm">
            <div className="px-6 py-4 border-b border-zinc-100 bg-zinc-50/50 flex items-center justify-between">
              <h2 className="text-[10px] font-bold text-zinc-500 uppercase tracking-[0.2em] flex items-center gap-2">
                <Terminal className="w-4 h-4 text-zinc-400" />
                Input Parameters
              </h2>
            </div>
            
            <div className="p-8 flex-1">
              <form id="toolForm" onSubmit={handleSubmit} className="space-y-8">
                {(tool.inputs || []).map((input, idx) => (
                  <div key={idx} className="space-y-2.5">
                    <label className="text-[10px] font-bold text-zinc-900 uppercase tracking-widest block">
                      {input.label}
                    </label>
                    
                    {input.type === 'textarea' && (
                      <textarea
                        name={input.name}
                        placeholder={input.placeholder}
                        required={input.required}
                        rows={12}
                        className="w-full bg-zinc-50 border border-zinc-200 rounded-lg p-4 focus:ring-2 focus:ring-zinc-100 focus:border-zinc-300 focus:bg-white outline-none transition-all text-[13px] font-mono text-zinc-800 leading-relaxed placeholder:text-zinc-300 resize-none"
                      />
                    )}

                    {input.type === 'text' && (
                      <input
                        type="text"
                        name={input.name}
                        placeholder={input.placeholder}
                        required={input.required}
                        className="w-full bg-zinc-50 border border-zinc-200 rounded-lg h-12 px-4 focus:ring-2 focus:ring-zinc-100 focus:border-zinc-300 focus:bg-white outline-none transition-all text-[13px] font-mono text-zinc-800 placeholder:text-zinc-300"
                      />
                    )}

                    {input.type === 'number' && (
                      <input
                        type="number"
                        name={input.name}
                        defaultValue={input.value}
                        required={input.required}
                        className="w-full bg-zinc-50 border border-zinc-200 rounded-lg h-12 px-4 focus:ring-2 focus:ring-zinc-100 focus:border-zinc-300 focus:bg-white outline-none transition-all text-[13px] font-mono text-zinc-800"
                      />
                    )}

                    {input.type === 'file' && (
                      <div className="relative border-2 border-dashed border-zinc-200 bg-zinc-50 rounded-xl p-12 text-center transition-all group hover:border-zinc-300 hover:bg-zinc-100/50">
                        <input
                          type="file"
                          name={input.name}
                          multiple={input.multiple}
                          required={input.required}
                          className="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                        />
                        <div className="relative pointer-events-none">
                          <Download className="w-8 h-8 mx-auto mb-4 text-zinc-300 group-hover:text-zinc-500 transition-colors" />
                          <p className="text-xs font-bold text-zinc-900 tracking-tight">Upload System Objects</p>
                          <p className="text-[9px] text-zinc-400 mt-2 uppercase font-bold tracking-[0.2em]">Local Processing Active</p>
                        </div>
                      </div>
                    )}
                  </div>
                ))}

                <div className="flex gap-4 pt-4">
                  <button
                    type="submit"
                    disabled={processing}
                    className="flex-1 h-12 bg-zinc-900 text-white text-[11px] font-bold uppercase tracking-widest rounded-lg transition-all hover:bg-zinc-800 disabled:bg-zinc-100 disabled:text-zinc-400 active:scale-[0.98] flex items-center justify-center gap-3"
                  >
                    {processing ? (
                      <Loader2 className="w-4 h-4 animate-spin" />
                    ) : (
                      <Zap size={14} fill="currentColor" />
                    )}
                    {processing ? "Executing..." : "Run Operation"}
                  </button>
                  <button
                    type="button"
                    onClick={() => document.getElementById("toolForm").reset()}
                    className="w-12 h-12 border border-zinc-200 rounded-lg flex items-center justify-center text-zinc-400 transition-all hover:bg-red-50 hover:border-red-100 hover:text-red-500"
                    title="Reset Module"
                  >
                    <Trash2 size={18} />
                  </button>
                </div>
              </form>
            </div>
          </section>

          {/* Output Module */}
          <section className="bg-zinc-50/50 border border-zinc-200 rounded-xl overflow-hidden flex flex-col shadow-sm">
            <div className="px-6 py-4 border-b border-zinc-100 bg-white flex items-center justify-between">
              <h2 className="text-[10px] font-bold text-zinc-500 uppercase tracking-[0.2em] flex items-center gap-2">
                <Sparkles className="w-4 h-4 text-zinc-400" />
                Generated Output
              </h2>
              {result && !error && (
                <div className="flex items-center gap-4">
                  <button 
                    onClick={handleCopy}
                    className={cn(
                      "flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest transition-colors",
                      copied ? "text-emerald-600" : "text-zinc-400 hover:text-zinc-900"
                    )}
                  >
                    {copied ? <Check size={14} /> : <Copy size={14} />}
                    {copied ? "Buffer Copied" : "Copy to Clipboard"}
                  </button>
                  <button className="text-zinc-300 hover:text-zinc-900 transition-colors" onClick={() => setResult(null)}>
                    <RefreshCw size={14} />
                  </button>
                </div>
              )}
            </div>
            
            <div className="flex-1 relative min-h-[500px] flex flex-col">
              <AnimatePresence mode="wait">
                {result || error ? (
                  <motion.div
                    key="result"
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    transition={{ duration: 0.2 }}
                    className="absolute inset-0 p-8 flex flex-col h-full"
                  >
                    <div className={cn(
                      "flex-1 text-[13px] overflow-auto whitespace-pre-wrap font-mono p-8 rounded-lg border leading-[1.8] bg-white shadow-inner",
                      error ? "text-red-500 border-red-100 bg-red-50/20" : "text-zinc-800 border-zinc-200"
                    )}>
                      {error || (typeof result === 'string' ? (
                        <div className="w-full" dangerouslySetInnerHTML={{ __html: result }} />
                      ) : (
                        JSON.stringify(result, null, 2)
                      ))}
                    </div>
                  </motion.div>
                ) : (
                  <motion.div
                    key="placeholder"
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    className="absolute inset-0 flex flex-col items-center justify-center text-center p-12"
                  >
                    <div className="w-14 h-14 rounded-xl border border-zinc-100 bg-white flex items-center justify-center mb-6 shadow-sm">
                      <Binary className="w-6 h-6 text-zinc-200" />
                    </div>
                    <h3 className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-2">Awaiting Parameters</h3>
                    <p className="text-[10px] text-zinc-300 max-w-[180px] uppercase font-bold leading-relaxed tracking-wider">
                      Populate required fields to generate results locally.
                    </p>
                  </motion.div>
                )}
              </AnimatePresence>
            </div>

            <div className="px-6 py-3.5 border-t border-zinc-100 bg-white flex items-center justify-between">
                <div className="flex items-center gap-3">
                  <div className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
                  <p className="text-[9px] font-bold text-zinc-400 uppercase tracking-widest">Client Encryption: Active</p>
                </div>
                <div className="text-[9px] font-bold text-zinc-300 uppercase tracking-widest">Local Node v2.4</div>
            </div>
          </section>
        </div>

        {/* Dynamic Context Modules */}
        <div className="mt-32 space-y-32">
          <ToolFeatures title={tool.title} category={tool.category.replace(/-/g, ' ')} />
          <SEOArticle title={tool.title} desc={tool.desc} category={tool.category} />
          <FAQSection title={tool.title} category={tool.category} />
        </div>

        {/* Related Infrastructure */}
        {relatedTools.length > 0 && (
          <section className="mt-32 pt-20 border-t border-zinc-200">
            <div className="flex items-center justify-between mb-12">
                 <div>
                    <h2 className="text-2xl font-bold text-zinc-900 tracking-tight mb-2">Horizontal Integration</h2>
                    <p className="text-sm text-zinc-500 font-medium">Compatible utilities within the {tool.category.replace(/-/g, ' ')} cluster.</p>
                 </div>
                 <Link to="/" className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest hover:text-zinc-900 transition-colors flex items-center gap-2">
                    Browse All Nodes <ArrowRight size={14} />
                 </Link>
            </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
              {relatedTools.map((rt, index) => (
                <Link key={rt.slug} to={`/tool/${rt.slug}`} className="block h-full">
                  <ToolCard 
                      title={rt.title}
                      desc={rt.desc}
                      category={rt.category.replace(/-/g, ' ')}
                      delay={index * 0.05}
                  />
                </Link>
              ))}
            </div>
          </section>
        )}
      </main>
    </div>
  );
};

export default ToolPage;
