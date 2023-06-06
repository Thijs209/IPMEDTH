import { writable } from 'svelte/store';

export const pop = writable({
    project: {
        description: '',
        result: '',
        succes: '',
        manager: '',
        bosses: '',
    },
    coreQuadrants: [],
    goals: [],
    learningGoals: []
});