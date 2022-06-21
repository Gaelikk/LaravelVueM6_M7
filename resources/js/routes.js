import Create from "./components/games/Create";
import Edit from "./components/games/Edit";
import Games from "./components/games/Games";


export const routes = [
    {
        name: "Games",
        path: "/games/games",
        component: Games
    },
    {
        name: "Create",
        path: "/games/create",
        component: Create
    },
    {
        name: "Edit",
        path: "/games/edit/:id",
        component: Edit
    }
]
