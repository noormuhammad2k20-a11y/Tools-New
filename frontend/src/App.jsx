import { Routes, Route, Link, Navigate, BrowserRouter as Router } from "react-router-dom";
import Navbar from "./components/Navbar";
import CommandBar from "./components/CommandBar";
import Home from "./pages/Home";
import ToolPage from "./pages/ToolPage";
import { Zap } from "lucide-react";

function App() {
  const pathname = window.location.pathname;
  // Universal basename: Extract the first segment of the path as the base
  const basename = pathname.split('/').slice(0, 2).join('/');

  return (
    <Router basename={basename}>
      <div className="min-h-screen bg-zinc-50 flex flex-col font-sans">
        <Navbar />
        <CommandBar />
        
        <main className="flex-1 pt-16 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-zinc-50 min-h-screen p-6 md:p-10">
          <div className="bg-white rounded-xl border border-zinc-200 shadow-sm overflow-hidden min-h-full flex flex-col">
            <div className="flex-1">
              <Routes>
                <Route index element={<Home />} />
                <Route path="/home" element={<Navigate to="/" replace />} />
                <Route path="/index.php" element={<Navigate to="/" replace />} />
                <Route path="/index.html" element={<Navigate to="/" replace />} />
                <Route path="/category/:catId" element={<Home />} />
                <Route path="/tool/:slug" element={<ToolPage />} />
                <Route path="*" element={<Navigate to="/" replace />} />
              </Routes>
            </div>

            <footer className="mt-auto border-t border-zinc-100 bg-zinc-50/50 px-6 sm:px-12 py-16">
                <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16">
                    <div className="col-span-2 lg:col-span-2">
                        <div className="flex items-center gap-2.5 mb-6 group cursor-default">
                          <div className="p-1.5 bg-zinc-900 text-white rounded shadow-sm">
                            <Zap size={16} fill="currentColor" />
                          </div>
                          <span className="text-sm font-bold tracking-tight text-zinc-900 uppercase">ToolMaster</span>
                        </div>
                        <p className="text-zinc-500 max-w-xs text-xs leading-relaxed mb-6 font-medium">
                            Professional digital utilities for software engineers and creators. High-performance, secure, and privacy-first by architecture.
                        </p>
                        <div className="flex items-center gap-3">
                           <div className="flex items-center gap-2 p-1 px-2 border border-zinc-200 rounded text-[10px] font-bold text-zinc-400 uppercase tracking-widest bg-white shadow-sm">
                             <div className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                             Network Status: Optimal
                           </div>
                        </div>
                    </div>
                    
                    <div className="flex flex-col gap-4">
                        <h4 className="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400">Products</h4>
                        <nav className="flex flex-col gap-2.5">
                          <Link to="/category/text-tools" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Text Processing</Link>
                          <Link to="/category/image-tools" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Visual Media</Link>
                          <Link to="/category/developer-tools" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Dev Ecosystem</Link>
                          <Link to="/category/unit-converters" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Data Conversion</Link>
                        </nav>
                    </div>

                    <div className="flex flex-col gap-4">
                        <h4 className="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400">Resources</h4>
                        <nav className="flex flex-col gap-2.5">
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Documentation</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">API Reference</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">System Status</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Community</Link>
                        </nav>
                    </div>

                    <div className="flex flex-col gap-4">
                        <h4 className="text-[10px] font-bold uppercase tracking-[0.2em] text-zinc-400">Governance</h4>
                        <nav className="flex flex-col gap-2.5">
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Privacy Policy</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Terms of Service</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Security Audit</Link>
                          <Link to="/" className="text-[11px] font-bold text-zinc-500 hover:text-zinc-900 transition-colors">Ethics Protocol</Link>
                        </nav>
                    </div>
                </div>

                <div className="pt-8 border-t border-zinc-200 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div className="text-[9px] font-bold text-zinc-400 uppercase tracking-[0.3em] flex items-center gap-4">
                      <span>© 2026 TOOLMASTER INFRASTRUCTURE</span>
                      <span className="hidden md:inline w-1 h-1 rounded-full bg-zinc-300"></span>
                      <span className="hidden md:inline">SYSTEM REVISION 2.4.9</span>
                    </div>
                    <div className="flex items-center gap-6">
                      <div className="text-[9px] font-extrabold text-zinc-300 uppercase tracking-[0.1em]">Verified Nodes: 1,402</div>
                      <div className="px-3 py-1 bg-zinc-100 rounded text-[9px] font-bold text-zinc-500 uppercase tracking-widest border border-zinc-200">Local-First Architecture</div>
                    </div>
                </div>
            </footer>
          </div>
        </main>
      </div>
    </Router>
  );
}

export default App;
