import { useState, useEffect } from "react";
import Hero from "../components/Hero";
import ToolCard from "../components/ToolCard";
import { 
  FileText, 
  Image as ImageIcon, 
  Code, 
  Calculator, 
  Type,
  Zap,
  Shield,
  Binary,
  Globe,
  Terminal,
  Grid
} from "lucide-react";
import { useNavigate, useParams } from "react-router-dom";

// Map of categories to Lucide icons
const categoryIcons = {
  'text-tools': Type,
  'developer-tools': Code,
  'math-calculators': Calculator,
  'security-tools': Shield,
  'image-tools': ImageIcon,
  'finance-tools': Zap,
  'unit-converters': Binary,
  'web-tools': Globe,
};

const Home = () => {
  const { catId } = useParams();
  const [tools, setTools] = useState([]);
  const [filteredTools, setFilteredTools] = useState([]);
  const [activeCategory, setActiveCategory] = useState("All");
  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    if (catId) {
      setActiveCategory(catId);
    } else {
      setActiveCategory("All");
    }
  }, [catId]);

  useEffect(() => {
    fetchTools();
  }, []);

  const fetchTools = async () => {
    try {
      const response = await fetch('api/list_tools.php');
      const data = await response.json();
      if (data.status === 'success' && data.tools) {
        const toolsArray = Object.entries(data.tools).map(([slug, details]) => ({
          slug,
          ...details
        }));
        setTools(toolsArray);
        setFilteredTools(toolsArray);
      }
    } catch (error) {
      console.error("Error fetching tools:", error);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    if (activeCategory === "All") {
      setFilteredTools(tools);
    } else {
      setFilteredTools(tools.filter(t => t.category === activeCategory));
    }
  }, [activeCategory, tools]);

  const categories = ["All", ...new Set(tools.map(t => t.category))].filter(Boolean);

  const handleToolClick = (slug) => {
    navigate(`/tool/${slug}`);
  };

  const handleCategoryClick = (cat) => {
    if (cat === "All") {
      navigate("/");
    } else {
      navigate(`/category/${cat}`);
    }
  };

  return (
    <div className="bg-white">
      <Hero />

      {/* Resource Grid Section */}
      <section className="px-8 md:px-12 py-20 pb-0 max-w-7xl mx-auto">
        
        {/* Navigation & Header */}
        <div className="flex flex-col space-y-10 mb-16">
          <div className="max-w-2xl">
            <h2 className="text-3xl font-extrabold text-zinc-900 tracking-tight mb-4">
              Premium Tool Directory
            </h2>
            <p className="text-zinc-500 text-base leading-relaxed font-medium">
              Explore our curated collection of professional-grade digital utilities. 
              High-speed processing, absolute privacy, and seamless integration.
            </p>
          </div>

          <div className="flex flex-wrap items-center gap-3">
            <button
              onClick={() => handleCategoryClick("All")}
              className={`flex items-center gap-2 px-5 py-2.5 rounded-full text-[11px] font-bold transition-all uppercase tracking-widest border ${
                activeCategory === "All"
                  ? "bg-zinc-900 text-white border-zinc-900 shadow-lg shadow-zinc-200"
                  : "bg-white text-zinc-500 border-zinc-200 hover:border-zinc-300 hover:text-zinc-900"
              }`}
            >
              <Grid size={14} />
              All Tools
            </button>
            
            {categories.filter(c => c !== "All").map((cat) => {
              const Icon = categoryIcons[cat] || FileText;
              return (
                <button
                  key={cat}
                  onClick={() => handleCategoryClick(cat)}
                  className={`flex items-center gap-2 px-5 py-2.5 rounded-full text-[11px] font-bold transition-all uppercase tracking-widest border ${
                    activeCategory === cat
                      ? "bg-zinc-900 text-white border-zinc-900 shadow-lg shadow-zinc-200"
                      : "bg-white text-zinc-500 border-zinc-200 hover:border-zinc-300 hover:text-zinc-900"
                  }`}
                >
                  <Icon size={14} />
                  {cat.replace(/-/g, ' ')}
                </button>
              );
            })}
          </div>
        </div>

        {/* Bento Grid Implementation */}
        {loading ? (
             <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 animate-pulse pb-20">
                {[...Array(12)].map((_, i) => (
                    <div key={i} className="h-48 bg-zinc-50 rounded-2xl border border-zinc-100" />
                ))}
             </div>
        ) : (
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 pb-20">
                {filteredTools.map((tool, index) => (
                <div key={tool.slug} onClick={() => handleToolClick(tool.slug)} className="cursor-pointer group">
                    <ToolCard 
                        title={tool.title}
                        desc={tool.desc}
                        icon={categoryIcons[tool.category] || FileText}
                        category={tool.category.replace(/-/g, ' ')}
                        isHot={tool.isHot}
                        delay={index * 0.02}
                    />
                </div>
                ))}
            </div>
        )}

        {/* Null State */}
        {!loading && filteredTools.length === 0 && (
          <div className="py-32 text-center border-2 border-dashed border-zinc-100 rounded-3xl bg-zinc-50/30 mb-20 overflow-hidden relative">
            <div className="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(99,102,241,0.03),transparent_70%)]" />
            <div className="relative z-10">
              <div className="w-16 h-16 bg-white border border-zinc-200 rounded-2xl shadow-sm flex items-center justify-center mx-auto mb-6 text-zinc-300">
                <Terminal size={32} strokeWidth={1.5} />
              </div>
              <h3 className="text-lg font-bold text-zinc-900 tracking-tight mb-3 uppercase tracking-widest text-sm">No utilities found</h3>
              <p className="text-zinc-400 max-w-[280px] mx-auto mb-8 font-medium text-xs leading-relaxed">
                Adjust your filters or search parameters to locate the required digital assets.
              </p>
              <button 
                onClick={() => handleCategoryClick("All")}
                className="px-8 py-3 bg-zinc-900 text-white rounded-lg text-[10px] font-bold hover:bg-zinc-800 transition-all uppercase tracking-widest shadow-xl shadow-zinc-200/50"
              >
                 Reset Directory
              </button>
            </div>
          </div>
        )}
      </section>
    </div>
  );
};

export default Home;
