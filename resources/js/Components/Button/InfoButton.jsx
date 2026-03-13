export default function InfoButton({
    className = "",
    disabled,
    children,
    ...props
}) {
    return (
        <button
            {...props}
            className={
                `inline-flex items-center rounded-md border border-transparent
                bg-blue-500 px-2 py-1 text-md tracking-widest text-black transition duration-150 ease-in-out
                hover:bg-blue-600 focus:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                active:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                ${disabled && "opacity-25"} ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
