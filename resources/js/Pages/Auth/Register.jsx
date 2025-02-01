import { RegisterForm } from "@/Components/Auth/register-form";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    });

    const submit = (e) => {
        e.preventDefault();

        post(route("register"), {
            onFinish: () => reset("password", "password_confirmation"),
        });
    };
    return (
        <div className="flex">
            <Head title="Log in" />
            <div className="w-full">
                <div className="grid min-h-svh lg:grid-cols-2">
                    <div className="relative hidden bg-muted lg:block">
                        <img
                            src="https://backiee.com/static/wallpapers/3840x2160/325616.jpg"
                            alt="Image"
                            className="absolute inset-0 h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
                        />
                    </div>
                    <div className="flex flex-col gap-4 p-6 md:p-10">
                        <div className="flex items-center justify-center flex-1">
                            <div className="w-full max-w-xs">
                                <RegisterForm />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
