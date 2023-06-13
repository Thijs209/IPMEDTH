import { writable } from 'svelte/store';

export const goal = writable({
    title: '',
    what: '',
    why: '',
    how: [{
        step: '',
        value: '',
    }],
    satisfied: '',
    support: '',
    when: '',
    feedback: '',
    type: '',
});

export const pop = writable({
    project: {
        description: '',
        result: '',
        success: '',
        manager: '',
        bosses: '',
    },
    coreQuadrants: {
        coreQualities: [],
        traps: [],
        challenges: [],
        allergies: []
    },
    goals: [goal],
});