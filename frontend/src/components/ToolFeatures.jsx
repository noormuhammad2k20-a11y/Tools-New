import React from 'react';
import { HelpCircle, Star, Zap, Shield, CheckCircle2, Cpu, Terminal } from 'lucide-react';
import { motion } from 'framer-motion';

const ToolFeatures = ({ title, category }) => {
  const features = [
    {
      icon: <Zap size={16} className="text-zinc-400" />,
      title: "Optimized Throughput",
      desc: "Instant processing with high-performance infrastructure."
    },
    {
      icon: <Shield size={16} className="text-zinc-400" />,
      title: "Secure Processing",
      desc: "End-to-end security; data remains within the local session."
    },
    {
      icon: <Star size={16} className="text-zinc-400" />,
      title: "Professional Grade",
      desc: "Designed for rigorous developer and professional workflows."
    }
  ];

  const steps = [
    {
      num: "01",
      text: `Provide input data in the designated configuration area.`
    },
    {
      num: "02",
      text: "Define tool parameters and operational constraints."
    },
    {
      num: "03",
      text: "Execute the process and retrieve standardized output."
    }
  ];

  return (
    <div className="section-features mt-24 space-y-24">
      {/* How to Use Section */}
      <section>
        <div className="flex items-center gap-3 mb-10">
          <div className="p-2.5 rounded bg-zinc-50 border border-zinc-200 text-zinc-400 shadow-sm">
            <HelpCircle size={18} strokeWidth={2} />
          </div>
          <h3 className="text-xl font-bold text-zinc-900 tracking-tight">Deployment Protocol</h3>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {steps.map((step, idx) => (
            <motion.div 
              key={idx}
              initial={{ opacity: 0, y: 10 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: idx * 0.1 }}
              className="p-8 border border-zinc-200 rounded-xl bg-white hover:border-zinc-300 transition-all group"
            >
              <div className="text-[9px] font-bold text-zinc-400 uppercase tracking-[0.25em] mb-4 group-hover:text-zinc-900 transition-colors">Phase {step.num}</div>
              <p className="text-zinc-500 text-[13px] leading-relaxed font-medium m-0">{step.text}</p>
            </motion.div>
          ))}
        </div>
      </section>

      {/* Internal Infrastructure Section */}
      <section className="bg-zinc-50/30 border border-zinc-200 rounded-xl p-10 relative overflow-hidden">
        <div className="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
            <div className="lg:col-span-2">
                <div className="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em] mb-4">Core Architecture</div>
                <h3 className="text-2xl font-bold text-zinc-900 tracking-tight mb-4 leading-tight">Infrastructure <br />Capabilities</h3>
                <p className="text-zinc-500 text-sm leading-relaxed font-medium">
                    Our {category} tools are built on a high-availability framework ensuring precision processing and maximum data integrity.
                </p>
            </div>
            <div className="lg:col-span-3 grid grid-cols-1 gap-4">
                {features.map((f, i) => (
                <div key={i} className="flex items-start gap-5 p-5 bg-white border border-zinc-200 rounded-lg hover:border-zinc-300 transition-all shadow-sm">
                    <div className="mt-0.5 p-2 bg-zinc-50 border border-zinc-200 rounded text-zinc-400">{f.icon}</div>
                    <div>
                        <h4 className="font-bold text-zinc-900 text-[11px] uppercase tracking-wider mb-1">{f.title}</h4>
                        <p className="text-[11px] text-zinc-500 font-medium m-0 leading-relaxed">{f.desc}</p>
                    </div>
                </div>
                ))}
            </div>
        </div>
      </section>

      {/* Pro Tip Section */}
      <section className="bg-emerald-50/50 border border-emerald-100 rounded-xl p-6 flex items-start gap-4">
        <div className="p-2 bg-white border border-emerald-100 rounded shadow-sm text-emerald-600">
          <CheckCircle2 size={18} strokeWidth={2.5} />
        </div>
        <div>
          <h4 className="font-bold text-emerald-900 text-[10px] uppercase tracking-widest mb-1.5">Optimization Status</h4>
          <p className="text-emerald-700/80 text-[13px] font-medium m-0 leading-relaxed">
            Utilize the <strong>Clear</strong> function within the session buffer to re-initialize task context for new operations.
          </p>
        </div>
      </section>
    </div>
  );
};

export default ToolFeatures;
