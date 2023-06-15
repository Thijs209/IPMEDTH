import moment from "moment";
import { writable, readable } from "svelte/store";

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
    goalSteps: [],
});

// For testing purposes only

export const currentPopTaskQuestions = readable({
    goal: "Wat is je overkoepelende doel?",
    result: "Wat is het resultaat van het behalen van dit doel?",
    succes: "Wanneer ben je tevreden?",
    manager: "Hoe kan je manager je helpen?",
    reportsOthers: "Rapporteer je aan anderen?",
});

export const currentPopTask = readable({
    goal: "Mijn overkoepoelende doel is om meer overzicht te creëren in mijn werkzaamheden.",
    result: "Wanneer ik meer overzicht heb, kan ik mijn werkzaamheden beter plannen en prioriteren.",
    succes: "Ik heb dit doel bereikt wanneer ik in het komende project minder stress ervaar.",
    manager:
        "Mijn manager, Vera PM, kan mij helpen door mij te helpen met het stellen van prioriteiten.",
    reportsOthers: "Ik rapporteer enkel aan Vera PM voor mijn werkzaamheden.",
});

export const currentPopCoreQuadrants = readable({
    coreQuality: "Ik ben een harde werker.",
    pitfall: "Ik ben een perfectionist.",
    allergy: "Ik kan niet tegen onduidelijkheid.",
    challenge: "Ik wil graag alles zelf doen.",
});

export const currentPopGoal1 = readable({
    goalId: 1001,
    goalType: "Gezondheid",
    what: "Ik wil graag meer overzicht creëren in mijn werkzaamheden.",
    why: "Wanneer ik meer overzicht heb, kan ik mijn werkzaamheden beter en prioriteren.",
    satisfied:
        "Ik ben tevreden wanneer ik in het komende project minder stress ervaar.",
    support:
        "Ik heb ondersteuning nodig van mijn manager, Vera PM, om mij te helpen met het stellen van prioriteiten.",
    deadline: moment().add(1, "month").format("Y-m-d h:i:s"),
    feedback:
        "Ik wens feedback van mijn behandelaar te ontvangen over mijn voortgang.",
});

export const currentPopGoalSteps1 = readable({
    goalId: 1002,
    stepId: 2,
    step: "Een agenda opzetten.",
    description:
        "Ik geloof dat een agenda mij zou kunnen helpen door het tastbaar te maken",
});

export const currentPopGoal2 = readable({
    goalId: 1002,
    goalType: "persoonlijk",
    what: "Ik wil graag meer doen aan mijn hobby's buiten werk.",
    why: "Wanneer ik meer tijd besteed aan mijn hobby's, kan ik mijn werk beter loslaten.",
    satisfied:
        "Ik ben tevreden wanneer ik in het komende project elk weekend gemiddeld 2 uur per maand aan mijn hobby (boogschieten) heb besteed.",
    support:
        "Ik heb ondersteuning nodig van mijn partner, Lou, om mij te helpen met het stellen van prioriteiten. Ik zou graag 's avonds tijd over willen houden om tot rust te komen voor het weekend.",
    deadline: moment().add(1, "month").format("Y-m-d h:i:s"),
    feedback:
        "Ik wens feedback van mijn trainingspartner te ontvangen over mijn voortgang. Ik denk dat het tot rust komen voor het weekend mij zal helpen om beter te present te zijn tijdens het boogschieten.",
});

export const currentPopGoal3 = readable({
    goalId: 1003,
    goalType: "organisatie",
    what: "Ik wil bijdragen aan het verbeteren van de werksfeer.",
    why: "Wanneer ik bijdraag aan het verbeteren van de werksfeer, kan ik beter samenwerken met mijn collega's.",
    satisfied:
        "Ik ben tevreden wanneer ik in het komende project 1 keer per week een compliment geef aan een collega.",
    support:
        "Ik zou graag ondersteuning van mijn teamleden willen ontvangen tijdens dit proces.",
    deadline: moment().add(1, "month").format("Y-m-d h:i:s"),
    feedback:
        "Ik wens feedback van mijn manager (Vera PM) te ontvangen na afloop van de POP cyclus.",
});

export const currentPopGoal4 = readable({
    goalId: 1004,
    goalType: "training",
    what: "Ik wil graag mijn communicatievaardigheden verbeteren.",
    why: "Wanneer ik mijn communicatievaardigheden verbeter, kan ik beter samenwerken met mijn collega's.",
    satisfied:
        "Ik ben tevreden wanneer ik in het komende project 1 keer per week een compliment geef aan een collega.",
    support:
        "Ik zou graag ondersteuning van mijn directe projectleden willen ontvangen. .",
    deadline: moment().add(1, "month").format("Y-m-d h:i:s"),
    feedback:
        "Ik wens feedback van mijn directe collega's (Vera PM) te ontvangen na afloop van het komende project.",
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

export const currentPop = writable({
    id: 1,
    user_id: 4, // Karin
    name: "Karin Tonnemann",
    task: currentPopTask,
    coreQuadrants: currentPopCoreQuadrants,
    goals: [currentPopGoal1, currentPopGoal2, currentPopGoal3, currentPopGoal4],
    goalSteps: [currentPopGoalSteps1],
});

export const notes = writable(JSON.parse(localStorage.notes || "[]"));

notes.subscribe((value) => (localStorage.notes = JSON.stringify(value)));
