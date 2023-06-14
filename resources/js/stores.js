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
    tabs: ["opdracht", "kernkwadranten", "doelen", "afsluiting"],
});

export const activeEvaluationTab = writable({
    tab: "opdracht",
});

export const sideBar = writable({
    open: false,
});

export const currentPopNotes = writable({
    notes: [],
});

// interface Note {
//     id: string;
//     pop_id: string;
//     text: string;
//     date: string;
// }

export const notes = writable(JSON.parse(localStorage.notes || "[]"));

notes.subscribe((value) => (localStorage.notes = JSON.stringify(value)));
