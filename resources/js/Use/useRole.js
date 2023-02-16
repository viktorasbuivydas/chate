import roles from "@/Enums/roles.js";

export default function useRole() {
    const canUserSeeAdminContent = (userRoles) => {
        console.log(userRoles);
        return [roles.SuperAdmin, roles.Admin, roles.Moderator].some((role) =>
            userRoles.includes(role)
        );
    };

    return {
        canUserSeeAdminContent,
    };
}
