import * as React from "react";
import AppLayout from "@/Layouts/AppLayout";
import { Home, CheckCircle, FileText, Clock, TrendingUp } from "lucide-react";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import {
    Label,
    PolarGrid,
    PolarRadiusAxis,
    RadialBar,
    RadialBarChart,
} from "recharts";
import {
    ChartContainer,
    ChartTooltip,
    ChartTooltipContent,
} from "@/components/ui/chart";

const chartConfig = {
    pending: {
        label: "Pending",
        color: "hsl(var(--chart-1))",
    },
    completed: {
        label: "Completed",
        color: "hsl(var(--chart-2))",
    },
};

export default function Dashboard({
    user,
    totalProperties,
    availableProperties,
    activeLeases,
    pendingPayments,
    upcomingExpiries,
    monthlyPaymentTrends,
    propertyStatusDistribution,
}) {
    const chartData = [
        {
            Pending: monthlyPaymentTrends["pending"],
            Completed: monthlyPaymentTrends["completed"],
        },
    ];

    const totalPayments = (
        parseFloat(chartData[0].Pending) + parseFloat(chartData[0].Completed)
    ).toFixed(2);

    return (
        <AppLayout user={user}>
            <div className="flex flex-col flex-1 gap-4 p-4 pt-0">
                <div className="grid gap-4 auto-rows-min md:grid-cols-2">
                    {/* Total Properties Card */}
                    <Card className="border-blue-200 bg-blue-50">
                        <CardHeader>
                            <div className="flex items-center space-x-2">
                                <Home className="w-6 h-6 text-blue-600" />
                                <CardTitle className="text-blue-800">
                                    Total Properties
                                </CardTitle>
                            </div>
                            <CardDescription className="text-2xl font-bold text-blue-600">
                                {totalProperties}
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    {/* Available Properties Card */}
                    <Card className="border-green-200 bg-green-50">
                        <CardHeader>
                            <div className="flex items-center space-x-2">
                                <CheckCircle className="w-6 h-6 text-green-600" />
                                <CardTitle className="text-green-800">
                                    Available Properties
                                </CardTitle>
                            </div>
                            <CardDescription className="text-2xl font-bold text-green-600">
                                {availableProperties}
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    {/* Active Leases Card */}
                    <Card className="border-purple-200 bg-purple-50">
                        <CardHeader>
                            <div className="flex items-center space-x-2">
                                <FileText className="w-6 h-6 text-purple-600" />
                                <CardTitle className="text-purple-800">
                                    Active Leases
                                </CardTitle>
                            </div>
                            <CardDescription className="text-2xl font-bold text-purple-600">
                                {activeLeases}
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    {/* Pending Payments Card */}
                    <Card className="border-orange-200 bg-orange-50">
                        <CardHeader>
                            <div className="flex items-center space-x-2">
                                <Clock className="w-6 h-6 text-orange-600" />
                                <CardTitle className="text-orange-800">
                                    Pending Payments
                                </CardTitle>
                            </div>
                            <CardDescription className="text-2xl font-bold text-orange-600">
                                ${parseFloat(pendingPayments).toFixed(2)}
                            </CardDescription>
                        </CardHeader>
                    </Card>
                </div>
                <div>
                    <Card className="flex flex-col">
                        <CardHeader className="items-center pb-0">
                            <CardTitle>Radial Chart - Text</CardTitle>
                            <CardDescription>
                                January - June 2024
                            </CardDescription>
                        </CardHeader>
                        <CardContent className="flex-1 pb-0">
                            <ChartContainer
                                config={chartConfig}
                                className="mx-auto aspect-square max-h-[250px]"
                            >
                                <RadialBarChart
                                    data={chartData}
                                    startAngle={0}
                                    endAngle={250}
                                    innerRadius={80}
                                    outerRadius={110}
                                >
                                    <PolarGrid
                                        gridType="circle"
                                        radialLines={false}
                                        stroke="none"
                                        className="first:fill-muted last:fill-background"
                                        polarRadius={[86, 74]}
                                    />
                                    <RadialBar
                                        dataKey='Completed'
                                        fill={chartConfig.completed.color}
                                        cornerRadius={10}
                                    />
                                    <PolarRadiusAxis
                                        tick={false}
                                        tickLine={false}
                                        axisLine={false}
                                    >
                                        <Label
                                            content={({ viewBox }) => {
                                                if (
                                                    viewBox &&
                                                    "cx" in viewBox &&
                                                    "cy" in viewBox
                                                ) {
                                                    return (
                                                        <text
                                                            x={viewBox.cx}
                                                            y={viewBox.cy}
                                                            textAnchor="middle"
                                                            dominantBaseline="middle"
                                                        >
                                                            <tspan
                                                                x={viewBox.cx}
                                                                y={viewBox.cy}
                                                                className="text-2xl font-bold fill-foreground"
                                                            >
                                                                ${totalPayments}
                                                            </tspan>
                                                            <tspan
                                                                x={viewBox.cx}
                                                                y={
                                                                    (viewBox.cy ||
                                                                        0) + 24
                                                                }
                                                                className="fill-muted-foreground"
                                                            >

                                                            </tspan>
                                                        </text>
                                                    );
                                                }
                                            }}
                                        />
                                    </PolarRadiusAxis>
                                </RadialBarChart>
                            </ChartContainer>
                        </CardContent>
                        <CardFooter className="flex-col gap-2 text-sm">
                            <div className="flex items-center gap-2 font-medium leading-none">
                                Trending up by 5.2% this month{" "}
                                <TrendingUp className="w-4 h-4" />
                            </div>
                            <div className="leading-none text-muted-foreground">
                                Showing total visitors for the last 6 months
                            </div>
                        </CardFooter>
                    </Card>
                </div>
                <div className="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min" />
            </div>
        </AppLayout>
    );
}
