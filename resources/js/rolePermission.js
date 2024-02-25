import { router } from '@inertiajs/vue3';

let startRoles = false;
let startPermissions = false;
let userRoles = [];
let userPermissions = [];

/**
 * Permite consultar si un usuario tiene un role
*/
const hasRole = (roles) => {
    if(!startRoles) {
        let userRolesModel = router.page.props.user.roles;

        userRolesModel.forEach((model) => {
            userRoles.push(model.name);
        });
    }
    
    let verifyRoles = roles.split('|');

    for (let role in verifyRoles) {
        if(userRoles.length != 0) {
            if(userRoles.indexOf(verifyRoles[role]) != -1) {
                return true;
            }
        }
    }

    return false;
}

/**
 * Permite consultar si un usuario tiene un permiso especifico
 */
const hasPermission = (permisions) => {
    if(!startPermissions) {
        let userPermissionsModel = router.page.props.shareUserPermissions;
        
        userPermissionsModel.forEach((model) => {
            userPermissions.push(model.name);
        });
    }

    let verifyPermissions = permisions.split('|');


    for (let permision in verifyPermissions) {
        if(userPermissions.length != 0) {
            if(userPermissions.indexOf(verifyPermissions[permision]) != -1) {
                return true;
            }
        }
    }

    return false;
}

export { hasRole, hasPermission };