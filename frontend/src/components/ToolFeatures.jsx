import React from 'react';
import { HelpCircle, Star, Zap, Shield, CheckCircle2, Cpu, Terminal } from 'lucide-react';
import { motion } from 'framer-motion';

const ToolFeatures = ({ title, category }) => {
  const features = [
    {
      icon: <Zap className="w-4 h-4 text-slate-400" />,
      title: "Optimized Throughput",
      desc: "Instant processing with high-performance infrastructure."
    },
    {
      icon: <Shield className="w-4 h-4 text-slate-400" />,
      title: "Encrypted Protocol",
      desc: "End-to-end security; data remains within the session."
    },
    {
      icon: <Star className="w-4 h-4 text-slate-400" />,
      title: "Enterprise Precision",
      desc: "Designed for rigorous professional and developer workflows."
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
    <div className="section-features mt-16 space-y-16">
      {/* How to Use Section */}
      <section>
        <div className="flex items-center gap-2 mb-8">
          <div className="p-2 rounded-[6px] bg-slate-50 border border-slate-100 text-slate-400">
            <HelpCircle className="w-5 h-5" strokeWidth={1.5} />
          </div>
          <h3 className="text-xl font-bold text-slate-900 uppercase tracking-tight">Deployment Guide</h3>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          {steps.map((step, idx) => (
            <motion.div 
              key={idx}
              initial={{ opacity: 0, y: 10 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: idx * 0.1 }}
              className="pro-panel p-6 relative overflow-hidden group hover:border-slate-300 transition-colors"
            >
              <div className="text-[10px] font-black text-slate-100 uppercase tracking-widest mb-4">Phase {step.num}</div>
              <p className="text-slate-500 text-[13px] font-medium leading-relaxed m-0">{step.text}</p>
            </motion.div>
          ))}
        </div>
      </section>

      {/* Internal Infrastructure Section */}
      <section className="bg-white border border-slate-200 rounded-[6px] p-10 relative overflow-hidden">
        <div className="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
            <div className="lg:col-span-2">
                <div className="text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-4">Core Infrastructure</div>
                <h3 className="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4 leading-tight">System <br />Capabilities</h3>
                <p className="text-slate-400 text-xs font-medium leading-relaxed">
                    Our {category} tools are built on a high-availability infrastructure ensuring 99.9% processing uptime and maximum data integrity.
                </p>
            </div>
            <div className="lg:col-span-3 grid grid-cols-1 gap-3">
                {features.map((f, i) => (
                <div key={i} className="flex items-start gap-4 p-4 bg-slate-50/50 border border-slate-100 rounded-[4px] hover:bg-slate-50 transition-colors">
                    <div className="mt-0.5 p-1.5 bg-white border border-slate-100 rounded-[4px]">{f.icon}</div>
                    <div>
                        <h4 className="font-bold text-slate-800 text-xs uppercase tracking-wide">{f.title}</h4>
                        <p className="text-[11px] text-slate-400 font-medium m-0">{f.desc}</p>
                    </div>
                </div>
                ))}
            </div>
        </div>
      </section>

      {/* Pro Tip Section */}
      <section className="bg-emerald-50/50 border border-emerald-100 rounded-[6px] p-6 flex items-start gap-4">
        <div className="p-2 bg-emerald-100 rounded-[4px] text-emerald-600">
          <CheckCircle2 className="w-5 h-5" strokeWidth={2} />
        </div>
        <div>
          <h4 className="font-bold text-emerald-900 text-sm uppercase tracking-wider">Optimization Tip</h4>
          <p className="text-emerald-700/80 text-[13px] font-medium mt-1 m-0">
            Utilize the <strong>Clear</strong> command to flush the current session buffer and initialize a new task context.
          </p>
        </div>
      </section>
    </div>
  );
};

export default ToolFeatures;
