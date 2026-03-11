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
      <div className="flex items-center gap-3 mb-8">
        <div className="p-2 rounded-[6px] bg-slate-50 border border-slate-100 text-slate-400">
          <HelpCircle className="w-5 h-5" strokeWidth={1.5} />
        </div>
        <h2 className="text-xl font-bold text-slate-900 uppercase tracking-tight">Frequently Asked Questions</h2>
      </div>

      <div className="space-y-3">
        {faqs.map((faq, index) => (
          <div 
            key={index}
            className={cn(
               "pro-panel transition-all duration-200",
               openIndex === index ? "border-slate-300" : "hover:border-slate-300"
            )}
          >
            <button
              onClick={() => setOpenIndex(openIndex === index ? -1 : index)}
              className="w-full flex items-center justify-between p-5 text-left focus:outline-none"
            >
              <span className={cn(
                "text-sm font-bold tracking-tight transition-colors",
                openIndex === index ? "text-slate-900" : "text-slate-600"
              )}>
                {faq.q}
              </span>
              <ChevronDown className={cn(
                "w-4 h-4 text-slate-300 transition-transform duration-300 shrink-0",
                openIndex === index ? "rotate-180 text-slate-900" : ""
              )} />
            </button>
            
            <div 
              className={cn(
                "overflow-hidden transition-all duration-300 ease-in-out px-1",
                openIndex === index ? "max-h-96 pb-5 opacity-100" : "max-h-0 opacity-0"
              )}
            >
              <div className="px-4 py-3 bg-slate-50/50 rounded-[4px] mx-4 border border-slate-100/50">
                <p className="text-slate-500 leading-relaxed text-sm font-medium">
                  {faq.a}
                </p>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default FAQSection;
