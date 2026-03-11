import { motion } from "framer-motion";
import { Sparkles, Terminal } from "lucide-react";

const Hero = () => {
  return (
    <section className="relative pt-32 pb-20 px-10 bg-white border-b border-slate-100 overflow-hidden">
      {/* Subtle Background Element */}
      <div className="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl opacity-50" />
      
      <div className="max-w-5xl mx-auto relative z-10">
        <motion.div
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.4 }}
          className="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-50 border border-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-[0.15em] mb-8"
        >
          <Terminal className="w-3.5 h-3.5" />
          Modern Development Infrastructure
        </motion.div>

        <div className="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
          <div className="lg:col-span-3">
            <motion.h1
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.1, duration: 0.5 }}
              className="text-4xl md:text-5xl lg:text-6xl font-black tracking-tighter text-slate-900 leading-[1.05] mb-6 uppercase"
            >
              Professional <br />
              <span className="text-primary">Tool Infrastructure</span>
            </motion.h1>

            <motion.p
              initial={{ opacity: 0, x: -20 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.2, duration: 0.5 }}
              className="text-lg md:text-xl text-slate-500 mb-10 max-w-xl leading-relaxed font-medium"
            >
              Enterprise-grade digital tools for developers, designers, and professionals. 
              Zero latency processing, privacy-first architecture.
            </motion.p>

            <motion.div
              initial={{ opacity: 0, y: 10 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.3, duration: 0.5 }}
              className="flex items-center gap-4"
            >
              <button className="pro-btn-solid h-12 px-8 text-sm font-bold uppercase tracking-wider">
                Explore Resources
              </button>
              <div className="flex -space-x-2">
                {[1, 2, 3].map((i) => (
                  <div key={i} className="w-8 h-8 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-400">
                    ID
                  </div>
                ))}
                <div className="pl-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest self-center">
                  +12.4k Professionals
                </div>
              </div>
            </motion.div>
          </div>

          <motion.div 
            initial={{ opacity: 0, scale: 0.95 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ delay: 0.4, duration: 0.6 }}
            className="lg:col-span-2 hidden lg:block"
          >
            <div className="pro-panel p-8 bg-slate-50/50 relative overflow-hidden group">
               <div className="flex items-center gap-2 mb-6">
                 <div className="w-3 h-3 rounded-full bg-red-400" />
                 <div className="w-3 h-3 rounded-full bg-amber-400" />
                 <div className="w-3 h-3 rounded-full bg-emerald-400" />
               </div>
               <div className="space-y-4">
                 <div className="h-2 w-3/4 bg-slate-200 rounded-full" />
                 <div className="h-2 w-full bg-slate-200 rounded-full" />
                 <div className="h-2 w-5/6 bg-slate-200 rounded-full" />
                 <div className="h-2 w-2/3 bg-slate-200 rounded-full" />
               </div>
               <div className="mt-8 pt-8 border-t border-slate-100 flex items-center justify-between">
                 <div className="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                    <Sparkles className="w-3 h-3 text-primary" />
                    System Status
                 </div>
                 <div className="px-2 py-0.5 rounded bg-emerald-100 text-emerald-600 text-[10px] font-bold uppercase">
                    Optimal
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
