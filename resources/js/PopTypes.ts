type Pop = {
    id: number;
    user_id: number;
    first_name: string;
    last_name: string;
    description: string;
    created_at: string;
    updated_at: string;
    task: {
        goal: {
            question: string;
            answer: string;
        };
        results: {
            question: string;
            answer: string;
        };
        success: {
            question: string;
            answer: string;
        };
        manager: {
            question: string;
            answer: string;
        };
        reportsOthers: {
            question: string;
            answer: string;
        };
    };
    // 2. Kernkwadranten
    //Core Quadrants eager loaded on FK pop_id
    coreQuadrants: {
        coreQuality: string;
        pitfall: string;
        allergy: string;
        challenge: string;
    };
    // 3. Doelen
    //Goals eager loaded on FK pop_id
    goals: [
        {
            id: number;
            goalType: string;
            name: string;
            what: string;
            why: string;
            satisfied: string;
            support: string;
            deadline: string;
            feedback: string;
            updatedAt: string;
            goalTasks: [
                {
                    id: number;
                    goal_id: number;
                    name: string;
                    description: string;
                    deadline: string;
                    achieved: boolean;
                    createdAt: string;
                    updatedAt: string;
                }
            ];
        }
    ];
};

type Goal = {
    id: number;
    goalType: string;
    name: string;
    what: string;
    why: string;
    satisfied: string;
    support: string;
    deadline: string;
    feedback: string;
    updatedAt: string;
    goalTasks: [
        {
            id: number;
            goal_id: number;
            name: string;
            description: string;
            deadline: string;
            achieved: boolean;
            createdAt: string;
            updatedAt: string;
        }
    ];
};

type GoalTask = {
    id: number;
    goal_id: number;
    name: string;
    description: string;
    deadline: string;
    achieved: boolean;
    createdAt: string;
    updatedAt: string;
};

type CoreQuadrant = {
    id: number;
    pop_id: number;
    coreQuality: string;
    pitfall: string;
    allergy: string;
    challenge: string;
    createdAt: string;
    updatedAt: string;
};

let currentPop: Pop = {
    id: 1,
    created_at: Date.now().toString(),
    updated_at: Date.now().toString(),
    user_id: 1,
    task: {
        goal: {
            question: "Wat is jouw opdracht en wat is het doel daarvan?",
            answer: "Ik moet een website maken voor een bedrijf.",
        },
        results: {
            question: "Hoe moet het eindresultaat er uit zien?",
            answer: "Het moet een website zijn met een homepagina, een contactpagina en een over ons pagina.",
        },
        success: {
            question: "Wanneer ben je succesvol?",
            answer: "Als de website af is en de klant tevreden is.",
        },
        manager: {
            question: "Wie is de leidinggevende?",
            answer: "Jeroen van Velden.",
        },
        reportsOthers: {
            question: "Rapporteer je nog naar anderen?",
            answer: "Nee, alleen naar Jeroen.",
        },
    },
    coreQuadrants: {
        coreQuality: "Sterk verantwoordelijkheids gevoel",
        pitfall: "Overbelasting",
        allergy: "Snelle opgevers",
        challenge: "Rustmomenten vinden",
    },
    goals: [{}],
    goalSteps: [{}],
    goalsTasks: [{}],
};
