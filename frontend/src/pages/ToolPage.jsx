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

  const handleSubmit = async (e) => {
    e.preventDefault();
    setProcessing(true);
    setError(null);
    setResult(null);

    const formData = new FormData(e.target);

    try {
      // Logic shift: Check if tool is handled locally
      if (isToolFrontendReady(slug)) {
        // executeToolLocally is async to allow for "Corporate Tech" deliberate latency or complex worker logic
        const localResult = await executeToolLocally(slug, formData);
        setResult(localResult);
      } else {
        // Fallback to server-side for tools not yet migrated
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
      setError(err.message || "Something went wrong during local processing.");
    } finally {
      // Artificial delay for "Thinking" state if the result was instant
      // This maintains the "High Performance Infrastructure" feel
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
      <div className="flex flex-col items-center justify-center min-h-[60vh] gap-4">
        <Loader2 className="w-8 h-8 text-primary animate-spin" strokeWidth={3} />
        <div className="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Initialising Environment...</div>
      </div>
    );
  }

  if (error && !tool) {
    return (
      <div className="min-h-screen flex flex-col items-center justify-center p-6 text-center bg-white">
        <Terminal className="w-12 h-12 text-slate-200 mb-6" strokeWidth={1} />
        <h2 className="text-xl font-bold text-slate-900 uppercase tracking-tighter mb-2">Resource failure</h2>
        <p className="text-slate-500 mb-8 max-w-xs text-xs font-medium uppercase tracking-widest">{error}</p>
        <Link to="/" className="pro-btn-solid h-12 px-8">
          Return to Dashboard
        </Link>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-white">
      {/* Dynamic Tool Header */}
      <header className="bg-slate-50/50 border-b border-slate-100 pt-20 pb-16 px-10">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-12">
          <div className="flex-1">
            <div className="flex items-center gap-2 mb-8">
              <Link to="/" className="text-[10px] font-bold text-slate-400 uppercase tracking-widest hover:text-slate-900 transition-colors">Directory</Link>
              <ChevronRight className="w-3 h-3 text-slate-300" />
              <span className="text-[10px] font-bold text-primary uppercase tracking-widest">{tool.category.replace(/-/g, ' ')}</span>
            </div>
            <h1 className="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 uppercase tracking-tighter leading-[0.9] mb-6">
              {tool.title}
            </h1>
            <p className="text-slate-500 font-medium max-w-2xl text-lg leading-relaxed">
              {tool.desc}
            </p>
          </div>
          
          <div className="hidden lg:flex items-center gap-8 pb-4">
            <div className="text-right">
                <div className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 opacity-60">Optimisation</div>
                <div className="text-xs font-bold text-slate-900">v4.2.1-STABLE</div>
            </div>
            <div className="w-[1px] h-10 bg-slate-200" />
            <div className="text-right">
                <div className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 opacity-60">Status</div>
                <div className="flex items-center gap-1.5 justify-end">
                    <div className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
                    <div className="text-xs font-bold text-emerald-500 uppercase tracking-wider">Optimal</div>
                </div>
            </div>
          </div>
        </div>
      </header>

      {/* Workspace */}
      <main className="max-w-7xl mx-auto px-10 py-20">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-10 items-stretch">
          
          {/* Input Panel */}
          <section className="flex flex-col pro-panel h-full bg-white">
            <div className="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
              <h2 className="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] flex items-center gap-2.5">
                <Terminal className="w-4 h-4" strokeWidth={1.5} />
                Input Protocol
              </h2>
            </div>
            <div className="flex-1 p-8">
              <form id="toolForm" onSubmit={handleSubmit} className="space-y-8">
                {(tool.inputs || []).map((input, idx) => (
                  <div key={idx} className="space-y-3">
                    <label className="text-[10px] font-bold text-slate-400 block uppercase tracking-widest">
                      {input.label}
                    </label>
                    
                    {input.type === 'textarea' && (
                      <textarea
                        name={input.name}
                        placeholder={input.placeholder}
                        required={input.required}
                        rows={10}
                        className="w-full bg-slate-50/50 border border-slate-100 rounded-[4px] p-5 focus:border-slate-300 focus:bg-white focus:ring-0 outline-none transition-all font-medium text-slate-900 text-[14px] leading-relaxed placeholder:text-slate-300 resize-none"
                      />
                    )}

                    {input.type === 'text' && (
                      <input
                        type="text"
                        name={input.name}
                        placeholder={input.placeholder}
                        required={input.required}
                        className="w-full bg-slate-50/50 border border-slate-100 rounded-[4px] p-4 focus:border-slate-300 focus:bg-white focus:ring-0 outline-none transition-all text-slate-900 text-sm font-medium placeholder:text-slate-300"
                      />
                    )}

                    {input.type === 'number' && (
                      <input
                        type="number"
                        name={input.name}
                        defaultValue={input.value}
                        required={input.required}
                        className="w-full bg-slate-50/50 border border-slate-100 rounded-[4px] p-4 focus:border-slate-300 focus:bg-white focus:ring-0 outline-none transition-all text-slate-900 text-sm font-medium"
                      />
                    )}

                    {input.type === 'file' && (
                      <div className="relative border border-dashed border-slate-200 bg-slate-50/30 rounded-[4px] p-12 text-center hover:border-slate-300 transition-all group">
                        <input
                          type="file"
                          name={input.name}
                          multiple={input.multiple}
                          required={input.required}
                          className="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                        />
                        <div className="text-slate-400">
                          <Download className="w-8 h-8 mx-auto mb-4 text-slate-200 group-hover:text-slate-300 transition-colors" strokeWidth={1.5} />
                          <p className="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Select Infrastructure Files</p>
                          <p className="text-[10px] text-slate-300 mt-2 uppercase font-bold tracking-widest">Supports multiple batching</p>
                        </div>
                      </div>
                    )}
                  </div>
                ))}

                <div className="flex gap-4 pt-6">
                  <button
                    type="submit"
                    disabled={processing}
                    className="flex-1 pro-btn-solid h-14 text-sm font-bold uppercase tracking-widest group"
                  >
                    {processing ? (
                      <Loader2 className="w-5 h-5 animate-spin" />
                    ) : (
                      <Zap className="w-4 h-4 transition-transform group-hover:scale-110" />
                    )}
                    {processing ? "Optimising Output..." : "Execute Protocol"}
                  </button>
                  <button
                    type="button"
                    onClick={() => document.getElementById("toolForm").reset()}
                    className="pro-btn-outline w-14 h-14 p-0 flex items-center justify-center shrink-0 border-slate-200"
                    title="Flush Buffer"
                  >
                    <Trash2 className="w-5 h-5" strokeWidth={1.5} />
                  </button>
                </div>
              </form>
            </div>
          </section>

          {/* Output Panel */}
          <section className="flex flex-col pro-panel h-full bg-slate-50/20">
            <div className="p-5 border-b border-slate-100 bg-white flex items-center justify-between">
              <h2 className="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] flex items-center gap-2.5">
                <Sparkles className="w-4 h-4" strokeWidth={1.5} />
                Calculated Output
              </h2>
              {result && !error && (
                <div className="flex gap-4">
                  <button 
                    onClick={handleCopy}
                    className={cn(
                      "flex items-center gap-2 transition-all font-bold text-[10px] uppercase tracking-[0.15em]",
                      copied ? "text-emerald-500" : "text-slate-400 hover:text-slate-900"
                    )}
                  >
                    {copied ? <Check className="w-3.5 h-3.5" /> : <Copy className="w-3.5 h-3.5" strokeWidth={2} />}
                    {copied ? "Buffered" : "Copy"}
                  </button>
                  <button className="text-slate-300 hover:text-red-400 transition-colors" onClick={() => setResult(null)}>
                    <RefreshCw className="w-3.5 h-3.5" strokeWidth={2} />
                  </button>
                </div>
              )}
            </div>
            
            <div className="flex-1 relative min-h-[500px]">
              <AnimatePresence mode="wait">
                {result || error ? (
                  <motion.div
                    key="result"
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    exit={{ opacity: 0 }}
                    className="absolute inset-0 p-8 flex flex-col"
                  >
                    <div className={cn(
                      "flex-1 text-[13px] font-medium overflow-auto whitespace-pre-wrap font-mono p-8 rounded-[4px] border border-slate-100 leading-relaxed shadow-sm bg-white",
                      error ? "text-red-500 border-red-100" : "text-slate-900"
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
                    className="absolute inset-0 flex flex-col items-center justify-center text-center p-12 select-none"
                  >
                    <div className="w-20 h-20 rounded-[6px] bg-slate-50 border border-slate-100 flex items-center justify-center mb-8">
                      <Terminal className="w-10 h-10 text-slate-200" strokeWidth={1} />
                    </div>
                    <h3 className="text-xs font-black text-slate-900 mb-3 uppercase tracking-[0.2em]">Ready for Calculation</h3>
                    <p className="text-[10px] text-slate-400 max-w-[240px] leading-relaxed font-bold uppercase tracking-widest opacity-60">
                      Configure protocols and execute to view standardized results.
                    </p>
                  </motion.div>
                )}
              </AnimatePresence>
            </div>

            <div className="p-5 border-t border-slate-100 bg-white flex items-center justify-between">
                <div className="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Session Encryption: Active</div>
                <div className="flex items-center gap-1.5 grayscale opacity-50">
                    <div className="w-1 h-1 rounded-full bg-slate-900" />
                    <div className="w-1 h-1 rounded-full bg-slate-900" />
                    <div className="w-1 h-1 rounded-full bg-slate-900" />
                </div>
            </div>
          </section>
        </div>

        {/* Content Expansion */}
        <div className="mt-40 space-y-40">
          <ToolFeatures title={tool.title} category={tool.category.replace(/-/g, ' ')} />
          <SEOArticle title={tool.title} desc={tool.desc} category={tool.category} />
          <FAQSection title={tool.title} category={tool.category} />
        </div>

        {/* Related Stack */}
        {relatedTools.length > 0 && (
          <section className="mt-40 pt-20 border-t border-slate-100">
            <div className="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
                 <div>
                    <div className="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-4">Infrastructure Expansion</div>
                    <h2 className="text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tighter leading-none">Extended Tool Stack</h2>
                 </div>
                 <Link to="/" className="pro-btn-outline h-12 px-8 text-[11px] font-bold uppercase tracking-[0.15em] flex items-center gap-3">
                    View Entire Grid
                    <ArrowRight className="w-4 h-4" />
                 </Link>
            </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
              {relatedTools.map((rt, index) => (
                <Link key={rt.slug} to={`/tool/${rt.slug}`}>
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
