import React, { useState } from "react";
import { ChevronDown, HelpCircle, Terminal } from "lucide-react";
import { cn } from "../lib/utils";

/**
 * Dynamically generates 3-4 highly relevant FAQ structures 
 * based on the core tool properties to satisfy SEO requirements.
 */
const FAQSection = ({ title, category }) => {
  const [openIndex, setOpenIndex] = useState(0);
  const displayCategory = category ? category.replace(/-/g, ' ') : "web";

  const faqs = [
    {
      q: `What is the ${title} and how does it work?`,
      a: `The ${title} is an automated online utility that processes your input quickly and securely. Simply provide your data in the input area above and click submit to receive your formatted results instantly. It operates entirely within your browser or securely via our optimized backend.`
    },
    {
      q: `Is the ${title} free to use?`,
      a: `Yes! All tools on ToolMaster, including the ${title}, are 100% free with no hidden limits. We believe professional ${displayCategory} utilities should be accessible to everyone.`
    },
    {
      q: `Is my data secure when using this tool?`,
      a: `Absolutely. Your privacy is our priority. Any data processed by the ${title} is handled securely and is never stored permanently or shared with third parties.`
    },
    {
      q: `Can I use the ${title} on my mobile device?`,
      a: `Yes, the ${title} is fully responsive. It works seamlessly across all devices including smartphones, tablets, and desktop computers without requiring any app installations.`
    }
  ];

  return (
    <div className="section-faq mt-0">
      <div className="flex items-center gap-3 mb-10">
        <div className="p-2.5 rounded bg-zinc-50 border border-zinc-200 text-zinc-400 shadow-sm">
          <HelpCircle size={18} strokeWidth={2} />
        </div>
        <h2 className="text-xl font-bold text-zinc-900 tracking-tight">Technical Support & FAQ</h2>
      </div>

      <div className="space-y-4">
        {faqs.map((faq, index) => (
          <div 
            key={index}
            className={cn(
               "border transition-all duration-300 rounded-xl overflow-hidden",
               openIndex === index ? "border-zinc-300 bg-white shadow-sm" : "border-zinc-100 bg-zinc-50/20 hover:border-zinc-200"
            )}
          >
            <button
              onClick={() => setOpenIndex(openIndex === index ? -1 : index)}
              className="w-full flex items-center justify-between p-6 px-8 text-left focus:outline-none group"
            >
              <span className={cn(
                "text-[14px] font-bold tracking-tight transition-colors",
                openIndex === index ? "text-zinc-900" : "text-zinc-500 group-hover:text-zinc-900"
              )}>
                {faq.q}
              </span>
              <div className={cn(
                "p-1.5 rounded-full transition-all duration-300",
                openIndex === index ? "bg-zinc-900 text-white rotate-180" : "bg-white border border-zinc-200 text-zinc-300 group-hover:text-zinc-600"
              )}>
                <ChevronDown className="w-3.5 h-3.5" />
              </div>
            </button>
            
            <div 
              className={cn(
                "overflow-hidden transition-all duration-300 ease-in-out",
                openIndex === index ? "max-h-96 pb-8 opacity-100" : "max-h-0 opacity-0"
              )}
            >
              <div className="px-8 pb-2">
                <p className="text-zinc-500 leading-relaxed text-[14px] font-medium m-0">
                  {faq.a}
                </p>
                <div className="mt-6 pt-6 border-t border-zinc-50 flex items-center gap-3">
                   <div className="w-1 h-1 rounded-full bg-zinc-200" />
                   <p className="text-[9px] font-bold text-zinc-300 uppercase tracking-widest">Verified Infrastructure Documentation</p>
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default FAQSection;
