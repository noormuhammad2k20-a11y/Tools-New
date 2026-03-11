import { Link, useLocation } from "react-router-dom";
import { 
  LayoutDashboard, 
  Type, 
  Code, 
  Calculator, 
  Shield, 
  Image as ImageIcon, 
  Zap, 
  Binary, 
  Globe,
  Settings,
  HelpCircle
} from "lucide-react";
import { cn } from "../lib/utils";

const menuItems = [
  { icon: LayoutDashboard, label: "Dashboard", path: "/" },
  { icon: Type, label: "Text", path: "/category/text-tools" },
  { icon: ImageIcon, label: "Images", path: "/category/image-tools" },
  { icon: Code, label: "Dev", path: "/category/developer-tools" },
  { icon: Shield, label: "Security", path: "/category/security-tools" },
  { icon: Zap, label: "Finance", path: "/category/finance-tools" },
  { icon: Binary, label: "Conversions", path: "/category/unit-converters" },
  { icon: Globe, label: "Web", path: "/category/web-tools" },
];

const Sidebar = () => {
  const location = useLocation();

  return (
    <aside className="fixed left-0 top-0 h-screen w-16 md:w-20 bg-white border-r border-slate-100 flex flex-col items-center py-6 z-50">
      <Link to="/" className="mb-10 p-2 rounded-xl bg-primary text-white">
        <Zap className="w-6 h-6" fill="currentColor" />
      </Link>

      <nav className="flex-1 flex flex-col gap-4">
        {menuItems.map((item) => {
          const isActive = location.pathname === item.path || (item.path === "/" && location.pathname === "/");
          return (
            <Link
              key={item.label}
              to={item.path}
              className={cn(
                "p-3 rounded-xl transition-all group relative",
                isActive 
                  ? "bg-slate-50 text-primary border border-slate-100" 
                  : "text-slate-400 hover:text-slate-900 hover:bg-slate-50"
              )}
            >
              <item.icon className="w-5 h-5" strokeWidth={isActive ? 2 : 1.5} />
              
              {/* Tooltip */}
              <div className="absolute left-full ml-4 px-2 py-1 bg-slate-900 text-white text-[10px] font-bold rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap uppercase tracking-widest">
                {item.label}
              </div>
            </Link>
          );
        })}
      </nav>

      <div className="mt-auto flex flex-col gap-4">
         <button className="p-3 rounded-xl text-slate-400 hover:text-slate-900 hover:bg-slate-50 transition-all">
          <HelpCircle className="w-5 h-5" strokeWidth={1.5} />
        </button>
        <button className="p-3 rounded-xl text-slate-400 hover:text-slate-900 hover:bg-slate-50 transition-all">
          <Settings className="w-5 h-5" strokeWidth={1.5} />
        </button>
      </div>
    </aside>
  );
};

export default Sidebar;
