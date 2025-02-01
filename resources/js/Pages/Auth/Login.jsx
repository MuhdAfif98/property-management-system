import { LoginForm } from "@/Components/Auth/login-form";
import { Head } from "@inertiajs/react";

export default function Login() {
    return (
        <div className="flex">
            <Head title="Log in" />
            <div className="w-full">
                <div className="grid min-h-svh lg:grid-cols-2">
                    <div className="flex flex-col gap-4 p-6 md:p-10">
                        <div className="flex items-center justify-center flex-1">
                            <div className="w-full max-w-xs">
                                <LoginForm />
                            </div>
                        </div>
                    </div>
                    <div className="relative hidden bg-muted lg:block">
                        <img
                            src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?cs=srgb&dl=pexels-binyaminmellish-186077.jpg&fm=jpg"
                            alt="Image"
                            className="absolute inset-0 h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
                        />
                    </div>
                </div>
            </div>
        </div>
    );
}
