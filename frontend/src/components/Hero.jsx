import { motion } from "framer-motion";
import { Sparkles, Terminal } from "lucide-react";

const Hero = () => {
  return (
    <section className="relative py-24 px-8 md:px-12 bg-white border-b border-zinc-200 overflow-hidden">
      {/* Background Polish */}
      <div className="absolute inset-0 z-0 pointer-events-none">
        <div className="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(99,102,241,0.06),transparent_50%)]" />
        <div className="absolute inset-0 bg-[linear-gradient(rgba(244,244,245,0.4)_1px,transparent_1px),linear-gradient(90deg,rgba(244,244,245,0.4)_1px,transparent_1px)] bg-[size:40px_40px]" />
      </div>

      <div className="max-w-7xl mx-auto relative z-10">
        <motion.div
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.4 }}
          className="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-full border border-zinc-200 bg-white shadow-sm text-zinc-500 text-[10px] font-extrabold uppercase tracking-widest mb-10"
        >
          <Terminal size={12} className="text-zinc-400" />
          <span className="text-zinc-400">System Status:</span>
          <span className="text-indigo-600">Enterprise v2.4 Stable</span>
        </motion.div>

        <div className="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
          <div className="lg:col-span-7 xl:col-span-6 text-left">
            <motion.h1
              initial={{ opacity: 0, x: -10 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.1, duration: 0.4 }}
              className="text-4xl md:text-5xl lg:text-7xl font-extrabold tracking-tight text-zinc-900 leading-[1.05] mb-8"
            >
              The Global Standard for <br />
              <span className="text-indigo-600">Digital Tooling</span>
            </motion.h1>

            <motion.p
              initial={{ opacity: 0, x: -10 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.2, duration: 0.4 }}
              className="text-lg md:text-xl text-zinc-500 mb-12 max-w-xl leading-relaxed font-medium"
            >
              High-performance utilities for modern engineers. Secure, fast, and engineered for precision at scale.
            </motion.p>

            <motion.div
              initial={{ opacity: 0, y: 10 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.3, duration: 0.4 }}
              className="flex flex-wrap items-center gap-4"
            >
              <button className="px-8 h-12 bg-zinc-900 text-white text-[11px] font-bold uppercase tracking-widest rounded-lg shadow-xl shadow-zinc-200/50 transition-all hover:bg-zinc-800 active:scale-[0.98]">
                Explore Toolbox
              </button>
              <button className="px-8 h-12 bg-white border border-zinc-200 text-zinc-500 text-[11px] font-bold uppercase tracking-widest rounded-lg transition-all hover:bg-zinc-50 hover:text-zinc-900">
                Documentation
              </button>
            </motion.div>

            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.5, duration:1 }}
              className="mt-16 pt-8 border-t border-zinc-100 flex items-center gap-10"
            >
              <div>
                <p className="text-2xl font-bold text-zinc-900 leading-none">500+</p>
                <p className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mt-2">Active Tools</p>
              </div>
              <div>
                <p className="text-2xl font-bold text-zinc-900 leading-none">1.4M</p>
                <p className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mt-2">Daily Ops</p>
              </div>
              <div>
                <p className="text-2xl font-bold text-zinc-900 leading-none">99.9%</p>
                <p className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mt-2">Security Score</p>
              </div>
            </motion.div>
          </div>

          <motion.div 
            initial={{ opacity: 0, scale: 0.95, y: 20 }}
            animate={{ opacity: 1, scale: 1, y: 0 }}
            transition={{ delay: 0.4, duration: 0.6 }}
            className="lg:col-span-5 xl:col-span-6 hidden lg:block perspective-1000"
          >
            <div className="relative rotate-x-2 rotate-z-2 hover:rotate-0 transition-transform duration-700">
              <div className="absolute -inset-4 bg-indigo-500/10 blur-3xl rounded-[3rem]" />
              <div className="bg-white border border-zinc-200 rounded-2xl shadow-2xl p-6 relative overflow-hidden group">
                <div className="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 via-zinc-900 to-indigo-500" />
                
                <div className="flex items-center justify-between mb-8">
                  <div className="flex items-center gap-2">
                    <div className="flex gap-1.5">
                      <div className="w-2.5 h-2.5 rounded-full bg-zinc-100" />
                      <div className="w-2.5 h-2.5 rounded-full bg-zinc-100" />
                      <div className="w-2.5 h-2.5 rounded-full bg-zinc-100" />
                    </div>
                  </div>
                  <div className="flex items-center gap-3">
                     <div className="h-4 w-px bg-zinc-100" />
                     <div className="w-6 h-6 rounded-md bg-zinc-50 border border-zinc-100 flex items-center justify-center">
                        <User size={12} className="text-zinc-400" />
                     </div>
                  </div>
                </div>

                <div className="space-y-6">
                  <div className="flex gap-4">
                    <div className="w-12 h-12 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 shrink-0">
                      <Zap size={24} fill="currentColor" />
                    </div>
                    <div className="flex-1 pt-1">
                      <div className="h-2 w-1/3 bg-zinc-900 rounded-full mb-2" />
                      <div className="h-1.5 w-full bg-zinc-100 rounded-full" />
                    </div>
                  </div>

                  <div className="grid grid-cols-2 gap-4">
                    <div className="p-4 rounded-xl bg-zinc-50 border border-zinc-100">
                      <div className="w-2 h-2 rounded-full bg-indigo-500 mb-3" />
                      <div className="h-1.5 w-3/4 bg-zinc-200 rounded-full" />
                    </div>
                    <div className="p-4 rounded-xl bg-zinc-50 border border-zinc-100">
                      <div className="w-2 h-2 rounded-full bg-zinc-200 mb-3" />
                      <div className="h-1.5 w-1/2 bg-zinc-200 rounded-full" />
                    </div>
                  </div>

                  <div className="pt-6 border-t border-zinc-100">
                     <div className="flex items-center justify-between mb-2">
                       <span className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Protocol Integrity</span>
                       <span className="text-[10px] font-bold text-indigo-600 uppercase tracking-widest">Verified</span>
                     </div>
                     <div className="h-2.5 w-full bg-zinc-100 rounded-full overflow-hidden">
                       <motion.div 
                        initial={{ width: 0 }}
                        animate={{ width: "94%" }}
                        transition={{ delay:1, duration: 1.5 }}
                        className="h-full bg-indigo-500 rounded-full" 
                       />
                     </div>
                  </div>
                </div>

                <div className="mt-8 flex items-center justify-between px-2 py-4 rounded-xl bg-zinc-900 text-white shadow-xl shadow-zinc-900/10">
                   <div className="flex items-center gap-3">
                     <div className="w-2 h-2 rounded-full bg-emerald-500" />
                     <span className="text-[10px] font-bold uppercase tracking-widest">Quantum Engine Online</span>
                   </div>
                   <Sparkles size={14} className="text-indigo-400" />
                </div>
              </div>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};

export default Hero;
