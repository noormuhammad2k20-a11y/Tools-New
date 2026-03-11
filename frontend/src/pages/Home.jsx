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
      const response = await fetch('/Tools%20New/api/list_tools.php');
      const data = await response.json();
      if (data.status === 'success') {
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
    <div className="bg-white min-h-screen">
      <Hero />

      {/* Main Section */}
      <section className="max-w-7xl mx-auto px-10 py-16">
        
        {/* Filter & Header */}
        <div className="flex flex-col space-y-12 mb-16">
          <div className="max-w-2xl">
            <h2 className="text-3xl font-bold text-slate-900 tracking-tight mb-4 uppercase">
              Resource Directory
            </h2>
            <p className="text-lg text-slate-500 font-medium">
              Explore our comprehensive suite of professional tools designed for precision and performance.
            </p>
          </div>

          <div className="flex flex-wrap items-center gap-3 border-y border-slate-100 py-6">
            <div className="flex items-center gap-2 mr-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
              <Grid className="w-3.5 h-3.5" />
              Categories
            </div>
            {categories.map((cat) => (
              <button
                key={cat}
                onClick={() => handleCategoryClick(cat)}
                className={`px-4 py-2 rounded-[6px] text-xs font-bold transition-all capitalize border ${
                  activeCategory === cat
                    ? "bg-slate-900 text-white border-slate-900 shadow-sm"
                    : "bg-white text-slate-400 border-slate-100 hover:border-slate-300 hover:text-slate-900"
                }`}
              >
                {cat.replace(/-/g, ' ')}
              </button>
            ))}
          </div>
        </div>

        {/* Grid System - "Bento Lite" */}
        {loading ? (
             <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 animate-pulse">
                {[...Array(12)].map((_, i) => (
                    <div key={i} className="h-48 bg-slate-50 rounded-lg border border-slate-100" />
                ))}
             </div>
        ) : (
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {filteredTools.map((tool, index) => (
                <div key={tool.slug} onClick={() => handleToolClick(tool.slug)}>
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

        {/* Empty State */}
        {!loading && filteredTools.length === 0 && (
          <div className="py-24 text-center section-empty scale-in border border-dashed border-slate-200 rounded-xl bg-slate-50/50">
            <Terminal className="w-12 h-12 text-slate-200 mx-auto mb-6" strokeWidth={1} />
            <h3 className="text-sm font-bold text-slate-900 uppercase tracking-wider mb-2">No tools matching filter</h3>
            <p className="text-xs text-slate-400 max-w-xs mx-auto mb-8 font-medium">We couldn't find any resources in this category. Try selecting another filter.</p>
            <button onClick={() => setActiveCategory("All")} className="pro-btn-outline mx-auto">
               View All Tools
            </button>
          </div>
        )}
      </section>
    </div>
  );
};

export default Home;
