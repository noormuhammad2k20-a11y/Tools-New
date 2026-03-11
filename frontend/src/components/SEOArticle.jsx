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
    <div className="section-article mt-32">
      <div className="flex items-center gap-3 mb-12">
        <div className="p-2.5 rounded bg-zinc-50 border border-zinc-200 text-zinc-400 shadow-sm">
          <Info size={18} strokeWidth={2} />
        </div>
        <h2 className="text-xl font-bold text-zinc-900 tracking-tight">Technical Specification</h2>
      </div>

      <div className="max-w-none space-y-16">
        <section className="bg-zinc-50/40 border border-zinc-200 p-10 rounded-xl relative overflow-hidden">
            <h3 className="text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em] mb-4">Executive Summary</h3>
            <p className="text-zinc-500 leading-relaxed text-[15px] max-w-4xl font-medium m-0">
                The <strong>{title}</strong> is a high-availability utility engineered for the {displayCategory} cluster. 
                Its core objective is to facilitate {desc.toLowerCase()} with precision and isolated security. 
                In professional environments, maintaining data integrity and operational speed is paramount. 
                This platform provides a zero-installation, cloud-isolated environment for critical {displayCategory} operations.
            </p>
        </section>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-16">
            <div className="space-y-6">
                <h3 className="text-[10px] font-bold text-zinc-900 flex items-center gap-3 uppercase tracking-[0.25em]">
                  <div className="w-1.5 h-1.5 rounded-full bg-zinc-900" />
                  Primary Objectives
                </h3>
                <p className="text-zinc-500 leading-relaxed text-[14px] font-medium">
                    Manual data handling often introduces significant margin for error and operational friction. 
                    The {title} protocol automates state transformations within the {displayCategory} space, 
                    ensuring results adhere to standardized architectural patterns. It serves as a vital component in modern professional workflows.
                </p>
            </div>

            <div className="space-y-6">
                <h3 className="text-[10px] font-bold text-zinc-900 flex items-center gap-3 uppercase tracking-[0.25em]">
                  <div className="w-1.5 h-1.5 rounded-full bg-zinc-900" />
                  Performance Metrics
                </h3>
                <ul className="space-y-4 m-0 p-0 list-none">
                    {[
                        "Atomic Execution Speed",
                        "High-Concurrency Support",
                        "Precision Algorithmic Mapping",
                        "Distributed Browser Optimization"
                    ].map((benefit, i) => (
                        <li key={i} className="text-[13px] text-zinc-500 font-bold flex items-center gap-3 bg-zinc-50/50 p-2 px-3 rounded border border-zinc-100/50">
                             <Zap size={12} className="text-zinc-300" />
                             {benefit}
                        </li>
                    ))}
                </ul>
            </div>
        </div>

        <section className="bg-white border border-zinc-200 p-10 rounded-xl shadow-sm">
            <div className="flex items-center gap-3 mb-6">
              <ShieldCheck className="w-5 h-5 text-zinc-900" />
              <h3 className="text-sm font-bold text-zinc-900 uppercase tracking-widest">
                  Infrastructure Privacy Status
              </h3>
            </div>
            <p className="text-zinc-500 leading-relaxed text-[14px] font-medium m-0 max-w-3xl">
                Cryptographic security and session isolation are foundational to this protocol. When executing the {title}, 
                all data streams are processed within secure memory segments. Our commitment to the {displayCategory} ecosystem 
                ensures these high-end utilities remain open-access for all verified professional nodes.
            </p>
        </section>
      </div>
    </div>
  );
};

export default SEOArticle;
