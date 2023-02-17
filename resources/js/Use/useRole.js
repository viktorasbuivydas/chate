import roles from "@/Enums/roles.js";

export default function useRole() {
    const canUserSeeAdminContent = (userRoles) => {
        console.log(userRoles);
        return [roles.SuperAdmin, roles.Admin, roles.Moderator].some((role) =>
            userRoles.includes(role)
        );
    };

    const renderRoleIcon = (role) => {
        switch (role) {
            case roles.SuperAdmin:
                return "♔";
            case roles.Admin:
                return "♚";
            case roles.Moderator:
                return "✤";
            case roles.Vip:
                return "✵";
            default:
                return "";
        }
    };

    const displayRoles = (userRoles) => {
        return userRoles.map((role) => {
            return renderRoleIcon(role);
        });
    };

    return {
        canUserSeeAdminContent,
        renderRoleIcon,
        displayRoles,
    };
}
