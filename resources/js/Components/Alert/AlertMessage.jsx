import React from "react";

function AlertMessage({ message }) {
    const hasSuccess = message.success ? true : false;
    const hasError = message.error ? true : false;

    if (!hasSuccess && !hasError) return null;

    const alertStyle = hasSuccess
        ? {
              bg: "bg-green-50",
              text: "text-green-800",
              content: message.success,
          }
        : {
              bg: "bg-red-50",
              text: "text-red-800",
              content: message.error,
          };
    return (
        <div
            className={`${alertStyle.text} ${alertStyle.bg} p-3 text-sm rounded-lg m-3`}
        >
            {alertStyle.content}
        </div>
    );
}


export default AlertMessage;