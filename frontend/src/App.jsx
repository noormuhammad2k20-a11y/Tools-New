import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";
import Sidebar from "./components/Sidebar";
import CommandBar from "./components/CommandBar";
import Home from "./pages/Home";
import ToolPage from "./pages/ToolPage";
import { Zap } from "lucide-react";

function App() {
  const isEncoded = window.location.pathname.includes('/Tools%20New');
  const basename = isEncoded ? '/Tools%20New' : '/Tools New';

  return (
    <Router basename={basename}>
      <div className="min-h-screen bg-white flex">
        <Sidebar />
        <CommandBar />
        
        <main className="flex-1 ml-16 md:ml-20">
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/category/:catId" element={<Home />} />
            <Route path="/tool/:slug" element={<ToolPage />} />
          </Routes>

          <footer className="border-t border-slate-100 py-16 px-10 mt-20 bg-slate-50/30">
              <div className="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-16">
                  <div className="col-span-1 md:col-span-2">
                      <div className="flex items-center gap-2 mb-6">
                          <Zap className="text-primary w-6 h-6" fill="currentColor" />
                          <span className="text-xl font-bold tracking-tight text-slate-900 uppercase">ToolMaster</span>
                      </div>
                      <p className="text-slate-500 max-w-sm mb-8 leading-relaxed font-medium">
                          The most professional set of digital tools for modern developers and creative professionals. Built for speed and utility.
                      </p>
                  </div>
                  
                  <div>
                      <h4 className="text-xs font-bold uppercase tracking-widest text-slate-400 mb-8 underline decoration-slate-200 underline-offset-8">Resources</h4>
                      <ul className="space-y-4 text-sm font-bold text-slate-500">
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">Privacy Policy</Link></li>
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">Terms of Service</Link></li>
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">Documentation</Link></li>
                      </ul>
                  </div>

                  <div>
                      <h4 className="text-xs font-bold uppercase tracking-widest text-slate-400 mb-8 underline decoration-slate-200 underline-offset-8">Support</h4>
                      <ul className="space-y-4 text-sm font-bold text-slate-500">
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">Help Center</Link></li>
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">API Status</Link></li>
                          <li><Link to="/" className="hover:text-slate-900 transition-colors">Contact Us</Link></li>
                      </ul>
                  </div>
              </div>
              <div className="max-w-6xl mx-auto mt-16 pt-8 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                  <div className="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
                    © 2026 TOOLMASTER GLOBAL. ALL RIGHTS RESERVED.
                  </div>
                  <div className="flex items-center gap-6">
                    <div className="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span className="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Systems Operational</span>
                  </div>
              </div>
          </footer>
        </main>
      </div>
    </Router>
  );
}

export default App;
