import AlertMessage from "@/Components/Alert/AlertMessage";
import InfoButton from "@/Components/Button/InfoButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, usePage } from "@inertiajs/react";

export default function UserShow({ auth, user }) {
    const { flash } = usePage().props;

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Usuários
                </h2>
            }
        >
            <Head title="Usuário" />

            <div className="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div className="overflow-hidden bg-white shadow-lg sm:rounded-lg dark:bg-gray-200">
                    <div className="flex justify-between items-center m-4">
                        <h3 className="text-lg">Visualizar</h3>
                        <div className="flex space-x-4">
                            <Link href={route("users.index")}>
                                <InfoButton>Listar</InfoButton>
                            </Link>
                        </div>
                    </div>

                    {/*Exibir mensagens de alerta*/}
                    <AlertMessage message={flash} />

                    <div className="bg-gray-50 text-sm  p-4 rounded-lg shadow-md">
                        <div className="mb-4">
                            <p className="text-md font-semibold text-gray-700 dark:text-gray-700">
                                ID
                            </p>
                            <p className="text-gray-600 dark:text-gray-700">
                                {user.id}
                            </p>
                        </div>

                        <div className="mb-4">
                            <p className="text-md font-semibold text-gray-700 dark:text-gray-700">
                                Nome
                            </p>
                            <p className="text-gray-600 dark:text-gray-700">
                                {user.name}
                            </p>
                        </div>
                        <div className="mb-4">
                            <p className="text-md font-semibold text-gray-700 dark:text-gray-700">
                                E-mail
                            </p>
                            <p className="text-gray-600 dark:text-gray-700">
                                {user.email}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
