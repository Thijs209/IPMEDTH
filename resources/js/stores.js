import { writable } from "svelte/store";

export const pop = writable({
    project: {
        description: "",
        result: "",
        succes: "",
        manager: "",
        bosses: "",
    },
    coreQuadrants: [],
    goals: [],
    learningGoals: [],
});

export const evaluationTabs = writable({
    tabs: ["opdracht", "kernkwadranten", "doelen", "leerdoelen", "afsluiting"],
});

export const activeEvaluationTab = writable({
    tab: "opdracht",
});

export const sideBar = writable({
    open: false,
});
