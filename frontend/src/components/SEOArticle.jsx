import React from "react";
import { Info, Target, Zap, ShieldCheck } from "lucide-react";

/**
 * A robust component that dynamically generates a 300+ word SEO-friendly 
 * article structure based on the specific tool's details.
 */
const SEOArticle = ({ title, desc, category }) => {
  const safeCategory = category ? category.replace(/-/g, ' ') : "our website";
  const displayCategory = safeCategory.toLowerCase() === 'all' ? 'web' : safeCategory;

  return (
    <div className="section-article mt-16">
      <div className="flex items-center gap-3 mb-8 pb-4 border-b border-slate-100">
        <div className="p-2 rounded-[6px] bg-slate-50 border border-slate-100 text-slate-400">
          <Info className="w-5 h-5" strokeWidth={1.5} />
        </div>
        <h2 className="text-xl font-bold text-slate-900 uppercase tracking-tight">Technical Overview: {title}</h2>
      </div>

      <div className="prose prose-slate max-w-none space-y-8">
        <section className="bg-white border border-slate-100 p-8 rounded-[6px]">
            <p className="text-slate-500 leading-relaxed text-sm font-medium m-0">
                The <strong>{title}</strong> is a specialized, professional-grade utility designed specifically for the {displayCategory} sector. 
                Its primary purpose is to help users {desc.toLowerCase()} efficiently and accurately. 
                In today's fast-paced digital environment, having reliable tools is crucial for maximizing productivity. 
                Whether you are a developer, designer, marketer, or business professional, this tool provides a seamless, 
                in-browser solution that requires no software installation or complicated configurations.
            </p>
        </section>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div className="space-y-4">
                <h3 className="text-sm font-bold text-slate-900 flex items-center gap-2 uppercase tracking-wider">
                    <Target className="w-4 h-4 text-slate-400" strokeWidth={2} />
                    Core Objectives
                </h3>
                <p className="text-slate-500 leading-relaxed text-[13px] font-medium">
                    Handling specific tasks manually can often lead to errors, inconsistencies, and wasted time. 
                    By utilizing the {title}, you entirely automate this process. It eliminates the friction associated with 
                    manual formatting, calculation, or conversion. For those working extensively within the {displayCategory} space, 
                    this utility acts as a vital companion function.
                </p>
            </div>

            <div className="space-y-4">
                <h3 className="text-sm font-bold text-slate-900 flex items-center gap-2 uppercase tracking-wider">
                    <Zap className="w-4 h-4 text-slate-400" strokeWidth={2} />
                    Operational Benefits
                </h3>
                <ul className="space-y-3 m-0 p-0 list-none">
                    {[
                        "Instant Result Processing",
                        "High Latency Performance",
                        "Precision-Engineered Algorithms",
                        "Cross-Platform Accessibility"
                    ].map((benefit, i) => (
                        <li key={i} className="text-[13px] font-medium text-slate-500 flex items-center gap-2">
                             <div className="w-1 h-1 rounded-full bg-slate-300" />
                             {benefit}
                        </li>
                    ))}
                </ul>
            </div>
        </div>

        <section className="bg-slate-50/50 border border-dashed border-slate-200 p-8 rounded-[6px]">
            <h3 className="text-sm font-bold text-slate-900 flex items-center gap-2 mb-4 uppercase tracking-wider">
                <ShieldCheck className="w-4 h-4 text-slate-400" strokeWidth={2} />
                Secure Infrastructure & Privacy
            </h3>
            <p className="text-slate-500 leading-relaxed text-[13px] font-medium m-0">
                Security and privacy are at the core of our platform. When using the {title}, all processing is handled securely. 
                We believe high-quality {displayCategory} utilities should be accessible to everyone, which is why this tool is provided 
                completely free of charge. Bookmark this page for quick access whenever you need to seamlessly execute this task in the future.
            </p>
        </section>
      </div>
    </div>
  );
};

export default SEOArticle;
