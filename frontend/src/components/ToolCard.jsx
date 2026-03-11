import { motion } from "framer-motion";
import { ArrowRight } from "lucide-react";
import { cn } from "../lib/utils";

const ToolCard = ({ title, desc, icon: Icon, category, isHot, delay = 0 }) => {
  return (
    <motion.div
      initial={{ opacity: 0, scale: 0.98 }}
      animate={{ opacity: 1, scale: 1 }}
      transition={{ delay, duration: 0.3 }}
      className="group relative flex flex-col h-full bg-white border border-zinc-200 rounded-2xl p-7 transition-all duration-300 hover:border-zinc-300 hover:shadow-xl hover:shadow-zinc-200/50 hover:-translate-y-1"
    >
      <div className="flex flex-col h-full relative z-10">
        {/* Header: Icon & Badge */}
        <div className="flex items-center justify-between mb-8">
          <div className="w-12 h-12 rounded-xl bg-zinc-50 border border-zinc-100 flex items-center justify-center text-zinc-400 group-hover:text-indigo-600 group-hover:bg-indigo-50 group-hover:border-indigo-100 transition-all duration-300">
            {Icon && <Icon size={22} strokeWidth={1.5} />}
          </div>
          {isHot && (
            <div className="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[9px] font-extrabold uppercase tracking-widest border border-indigo-100/50 shadow-sm">
              <div className="w-1 h-1 rounded-full bg-indigo-600 animate-pulse" />
              Priority
            </div>
          )}
        </div>

        {/* Content */}
        <div className="flex-1">
          <h3 className="text-base font-bold text-zinc-900 mb-3 tracking-tight group-hover:text-indigo-600 transition-colors duration-300 leading-snug">
            {title}
          </h3>
          <p className="text-[13px] text-zinc-500 line-clamp-2 leading-relaxed font-medium mb-2">
            {desc}
          </p>
        </div>

        {/* Footer */}
        <div className="mt-8 pt-6 border-t border-zinc-100 flex items-center justify-between">
          <div className="flex items-center gap-2">
             <div className="w-1.5 h-1.5 rounded-full bg-zinc-200 group-hover:bg-indigo-400 transition-colors" />
             <span className="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">
               {category}
             </span>
          </div>
          <ArrowRight size={16} className="text-zinc-300 group-hover:text-zinc-900 group-hover:translate-x-1 transition-all duration-300" />
        </div>
      </div>
    </motion.div>
  );
};

export default ToolCard;
