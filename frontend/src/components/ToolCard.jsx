import { motion } from "framer-motion";
import { ArrowRight } from "lucide-react";
import { cn } from "../lib/utils";

const ToolCard = ({ title, desc, icon: Icon, category, isHot, delay = 0 }) => {
  return (
    <motion.div
      initial={{ opacity: 0, y: 10 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ delay, duration: 0.3 }}
      className="group relative flex flex-col h-full pro-card p-5 rounded-lg cursor-pointer bg-white"
    >
      <div className="flex flex-col h-full bg-white">
        <div className="flex items-center justify-between mb-4">
          <div className="p-2.5 rounded-md bg-slate-50 border border-slate-100 text-slate-400 group-hover:text-slate-600 transition-colors duration-200">
            {Icon && <Icon className="w-5 h-5" strokeWidth={1.5} />}
          </div>
          {isHot && (
            <span className="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded uppercase tracking-wider">
              Popular
            </span>
          )}
        </div>

        <div className="flex-1">
          <h3 className="text-base font-bold text-slate-900 mb-1 group-hover:text-primary transition-colors duration-200">
            {title}
          </h3>
          <p className="text-sm text-slate-500 line-clamp-2 leading-snug font-medium mb-3">
            {desc}
          </p>
        </div>

        <div className="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
          <span className="text-[11px] font-bold text-slate-400 uppercase tracking-widest">
            {category}
          </span>
          <div className="flex items-center gap-1.5 text-xs font-bold text-slate-400 group-hover:text-primary transition-colors duration-200">
            Open <ArrowRight className="w-3.5 h-3.5" />
          </div>
        </div>
      </div>
    </motion.div>
  );
};

export default ToolCard;
