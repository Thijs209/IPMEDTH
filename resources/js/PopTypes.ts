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
    question: string;
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

