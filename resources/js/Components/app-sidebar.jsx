import * as React from "react";
import {
    AudioWaveform,
    BookOpen,
    Bot,
    Command,
    Frame,
    GalleryVerticalEnd,
    Map,
    PieChart,
    Settings2,
    SquareTerminal,
} from "lucide-react";

import { NavMain } from "@/components/nav-main";
import { NavLogout } from "@/components/nav-logout";
import { NavUser } from "@/components/nav-user";
import { TeamSwitcher } from "@/components/team-switcher";
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarRail,
} from "@/components/ui/sidebar";

const data = {
    navMain: [
        {
            title: "Dashboard",
            url: "#",
            icon: SquareTerminal,
            isActive: true,
        },
        {
            title: "Properties",
            url: "#",
            icon: Bot,
        },
        {
            title: "Insurance",
            url: "#",
            icon: BookOpen,
        },
        {
            title: "Income",
            url: "#",
            icon: Settings2,
        },
        {
            title: "Chat",
            url: "#",
            icon: Settings2,
        },
    ],
};

export function AppSidebar({ user, ...props }) {
    return (
        <Sidebar collapsible="icon" {...props}>
            <SidebarHeader>
                <NavUser user={user} />
            </SidebarHeader>
            <SidebarContent>
                <NavMain items={data.navMain} />
            </SidebarContent>
            <SidebarFooter>
                <NavLogout />
            </SidebarFooter>
            <SidebarRail />
        </Sidebar>
    );
}
