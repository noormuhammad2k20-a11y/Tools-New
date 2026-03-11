import React, { useState, useEffect } from "react";
import { 
  Search, 
  Command, 
  User, 
  Bell, 
  LayoutGrid, 
  Zap, 
  Menu, 
  X, 
  ChevronDown,
  Type,
  Code,
  Shield,
  Image as ImageIcon,
  Binary,
  Globe,
  LayoutDashboard
} from "lucide-react";
import { Link, useLocation } from "react-router-dom";
import { motion, AnimatePresence } from "framer-motion";
import { cn } from "../lib/utils";

const navItems = [
  { icon: Type, label: "Text", description: "Format, analyze and manipulate strings", path: "/category/text-tools" },
  { icon: ImageIcon, label: "Images", description: "Optimize, resize and convert media", path: "/category/image-tools" },
  { icon: Code, label: "Developer", description: "JSON markers, code formatting and git", path: "/category/developer-tools" },
  { icon: Shield, label: "Security", description: "Hash generators and token validation", path: "/category/security-tools" },
  { icon: Zap, label: "Finance", description: "Currency and mathematical modeling", path: "/category/finance-tools" },
  { icon: Binary, label: "Conversions", description: "Unit transformation protocols", path: "/category/unit-converters" },
  { icon: Globe, label: "Web", description: "Domain, DNS and HTTP utilities", path: "/category/web-tools" },
];

const Navbar = () => {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [isDropdownOpen, setIsDropdownOpen] = useState(false);
  const location = useLocation();

  // Close menus on route change
  useEffect(() => {
    setIsMobileMenuOpen(false);
    setIsDropdownOpen(false);
  }, [location]);

  return (
    <nav className="fixed top-0 left-0 right-0 h-16 bg-white border-b border-zinc-200 z-[100]">
      <div className="max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-8">
        {/* Brand */}
        <div className="flex items-center gap-8">
          <Link to="/" className="flex items-center gap-2.5 group">
            <div className="p-1.5 bg-zinc-900 text-white rounded-md shadow-sm group-hover:bg-zinc-800 transition-colors">
              <Zap size={18} fill="currentColor" />
            </div>
            <span className="text-lg font-bold tracking-tight text-zinc-900 uppercase">ToolMaster</span>
          </Link>

          {/* Desktop Nav Links */}
          <div className="hidden lg:flex items-center gap-1">
            <Link 
              to="/" 
              className={cn(
                "px-3 py-2 text-[13px] font-bold rounded-md transition-colors",
                location.pathname === "/" ? "text-zinc-900 bg-zinc-50" : "text-zinc-500 hover:text-zinc-900 hover:bg-zinc-50"
              )}
            >
              Dashboard
            </Link>
            
            <div className="relative">
              <button 
                onMouseEnter={() => setIsDropdownOpen(true)}
                className={cn(
                  "flex items-center gap-1.5 px-3 py-2 text-[13px] font-bold rounded-md transition-colors",
                  isDropdownOpen || location.pathname.includes('/category/') ? "text-zinc-900 bg-zinc-50" : "text-zinc-500 hover:text-zinc-900 hover:bg-zinc-50"
                )}
              >
                Service Clusters
                <ChevronDown size={14} className={cn("transition-transform duration-200", isDropdownOpen && "rotate-180")} />
              </button>

              <AnimatePresence>
                {isDropdownOpen && (
                  <motion.div 
                    initial={{ opacity: 0, y: 10 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: 10 }}
                    onMouseLeave={() => setIsDropdownOpen(false)}
                    className="absolute top-full left-0 mt-1 w-[480px] bg-white border border-zinc-200 rounded-xl shadow-xl overflow-hidden z-[110]"
                  >
                    <div className="p-4 grid grid-cols-2 gap-x-6 gap-y-1 bg-white">
                      <div className="col-span-2 mb-2">
                        <p className="text-[10px] font-extrabold uppercase tracking-widest text-zinc-400">Categories</p>
                      </div>
                      {navItems.map((item) => (
                        <Link
                          key={item.label}
                          to={item.path}
                          className={cn(
                            "flex items-center gap-4 px-3 py-3 rounded-lg transition-all group",
                            location.pathname === item.path ? "bg-zinc-50 text-zinc-900" : "text-zinc-500 hover:text-zinc-900 hover:bg-zinc-50/50"
                          )}
                        >
                          <div className={cn(
                            "w-8 h-8 rounded-md flex items-center justify-center border border-zinc-200 shrink-0",
                            location.pathname === item.path ? "bg-white text-zinc-900" : "bg-white text-zinc-400 group-hover:text-zinc-600 group-hover:border-zinc-300"
                          )}>
                            <item.icon size={16} />
                          </div>
                          <div className="overflow-hidden">
                            <p className="text-[13px] font-bold leading-none">{item.label}</p>
                            <p className="text-[10px] text-zinc-400 font-medium mt-1 truncate">{item.description}</p>
                          </div>
                        </Link>
                      ))}
                    </div>

                    <div className="p-4 bg-zinc-50 border-t border-zinc-100 flex items-center justify-between">
                       <div className="flex items-center gap-4">
                          <div className="p-2 bg-indigo-50 rounded text-indigo-600">
                             <Zap size={16} />
                          </div>
                          <div>
                            <p className="text-[11px] font-bold text-zinc-900">Featured Tool</p>
                            <p className="text-[10px] text-zinc-500 font-medium">Try our High-Speed Image Resizer</p>
                          </div>
                       </div>
                       <Link to="/tool/image-resizer" className="px-3 py-1.5 bg-white border border-zinc-200 rounded text-[10px] font-bold text-zinc-600 hover:text-zinc-900 transition-colors uppercase tracking-widest">
                         Open Tool
                       </Link>
                    </div>
                  </motion.div>
                )}
              </AnimatePresence>
            </div>
          </div>
        </div>

        {/* Center: Search Trigger (Desktop) */}
        <div className="flex-1 max-w-md hidden md:block">
          <button 
            onClick={() => window.dispatchEvent(new KeyboardEvent('keydown', { key: 'k', metaKey: true }))}
            className="w-full flex items-center gap-3 px-3 py-1.5 bg-zinc-50 border border-zinc-200 rounded-md text-zinc-300 hover:border-zinc-300 transition-all group"
          >
            <Search size={16} className="group-hover:text-zinc-500 transition-colors" />
            <span className="text-xs font-bold uppercase tracking-widest text-[10px]">Index Search...</span>
            <div className="ml-auto flex items-center gap-1 px-1.5 py-0.5 bg-white border border-zinc-200 rounded text-[10px] font-bold text-zinc-400 uppercase">
              <Command size={10} /> K
            </div>
          </button>
        </div>

        {/* Right side: Controls & Mobile Toggle */}
        <div className="flex items-center gap-2">
          <div className="hidden sm:flex items-center gap-2">
            <button className="p-2 text-zinc-400 hover:text-zinc-900 hover:bg-zinc-50 rounded-md transition-all relative">
              <Bell size={20} />
              <span className="absolute top-2 right-2 w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
            </button>
            <div className="h-4 w-px bg-zinc-200 mx-1" />
            <button className="flex items-center gap-3 p-1.5 pr-3 hover:bg-zinc-50 rounded-md transition-all border border-transparent hover:border-zinc-100 group">
              <div className="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-500 group-hover:bg-zinc-200 transition-colors border border-zinc-200 shadow-sm">
                <User size={18} />
              </div>
              <div className="hidden lg:block text-left">
                <p className="text-[11px] font-bold text-zinc-900 leading-none">Developer Account</p>
                <p className="text-[9px] text-zinc-400 leading-none mt-1 uppercase tracking-wider font-extrabold">Enterprise Node</p>
              </div>
            </button>
          </div>

          {/* Mobile Menu Toggle */}
          <button 
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            className="lg:hidden p-2 text-zinc-500 hover:text-zinc-900 hover:bg-zinc-50 rounded-md transition-all"
          >
            {isMobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Menu Overlay */}
      <AnimatePresence>
        {isMobileMenuOpen && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: "auto" }}
            exit={{ opacity: 0, height: 0 }}
            className="lg:hidden border-t border-zinc-200 bg-white overflow-hidden shadow-2xl"
          >
            <div className="p-4 space-y-1">
              <p className="px-4 py-2 text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em]">Operational Access</p>
              <Link 
                to="/" 
                className={cn(
                  "flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold",
                  location.pathname === "/" ? "bg-zinc-900 text-white" : "text-zinc-500 hover:bg-zinc-50"
                )}
              >
                <LayoutDashboard size={18} />
                Global Dashboard
              </Link>
              
              <div className="pt-4">
                <p className="px-4 py-2 text-[10px] font-bold text-zinc-400 uppercase tracking-[0.2em]">Service Clusters</p>
                <div className="grid grid-cols-1 gap-1">
                  {navItems.map((item) => (
                    <Link
                      key={item.label}
                      to={item.path}
                      className={cn(
                        "flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold",
                        location.pathname === item.path ? "text-zinc-900 bg-zinc-50/50" : "text-zinc-500 hover:bg-zinc-50"
                      )}
                    >
                      <item.icon size={18} className={location.pathname === item.path ? "text-zinc-900" : "text-zinc-400"} />
                      {item.label}
                    </Link>
                  ))}
                </div>
              </div>

              <div className="pt-4 pb-2">
                 <button 
                    onClick={() => {
                        setIsMobileMenuOpen(false);
                        window.dispatchEvent(new KeyboardEvent('keydown', { key: 'k', metaKey: true }));
                    }}
                    className="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold text-zinc-600 hover:bg-zinc-50"
                 >
                    <Search size={18} />
                    Quick Search
                 </button>
              </div>
            </div>
            
            <div className="p-4 bg-zinc-50 flex items-center justify-between border-t border-zinc-100">
               <div className="flex items-center gap-3">
                  <div className="w-8 h-8 rounded-full bg-zinc-200 flex items-center justify-center text-zinc-500">
                    <User size={18} />
                  </div>
                  <div>
                    <p className="text-[11px] font-bold text-zinc-900">Developer Account</p>
                    <p className="text-[9px] text-zinc-400 font-bold uppercase tracking-wider">Enterprise Node</p>
                  </div>
               </div>
               <button className="p-2 text-zinc-400 hover:text-zinc-900">
                 <Bell size={20} />
               </button>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </nav>
  );
};

export default Navbar;
