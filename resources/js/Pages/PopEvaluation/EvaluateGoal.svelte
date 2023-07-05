<script lang="ts">
    import { MdChevronRight } from "svelte-icons/md";
    import { slide } from "svelte/transition";
    import IconHolder from "./../../Components/IconHolder.svelte";

    export let createdGoal;
    export let open: boolean = false;
    export let goal: {
        goalId: number;
        goalType: string;
        what: string;
        why: string;
        satisfied: string;
        support: string;
        deadline: string;
        feedback: string;
        goalSteps: {
            stepId: number;
            step: string;
            description: string;
        };
    };
    if (window.location.href.indexOf("create-pop") > -1) {
        goal = createdGoal;
    }

    $: open;
    export async function handleClick() {
        open = !open;
    }
</script>

<!-- svelte-ignore a11y-click-events-have-key-events -->
<article class="goal" class:open>
    <header data-goalType={goal?.goalType} class="goal__header">
        <button on:click={handleClick} class="goal__toggle">
            {goal?.goalType}
            <div data-open={open} class="header__open">
                <IconHolder>
                    <MdChevronRight />
                </IconHolder>
            </div>
        </button>
        <div />
        <h3>{goal?.what}</h3>
    </header>
    {#if open}
        <section class="goal__body" transition:slide={{ duration: 300 }}>
            <h4>Omschrijving</h4>
            <div class="goal__section">
                <span class="u-bold">Deadline:</span>
                <p class="u-font-small">{goal?.deadline || "-"}</p>
            </div>
            <div class="goal__section">
                <span class="u-bold">Waarom?</span>
                <p class="u-font-small">{goal?.why || "-"}</p>
            </div>

            <div class="goal__section">
                <span class="u-bold">Tevreden:</span>
                <p class="u-font-small">{goal?.satisfied || "-"}</p>
            </div>
            <div class="goal__section">
                <span class="u-bold">Wilt ondersteuning van:</span>
                <p class="u-font-small">{goal?.support || "-"}</p>
            </div>
            <div class="goal__section">
                <span class="u-bold">Feedback:</span>
                <p class="u-font-small">{goal?.feedback || "-"}</p>
            </div>
            {#if goal?.goalSteps > 0 && goal?.goalSteps.description != undefined}
                <h4>Stappen</h4>
                <div class="steps">
                    {#each goal?.goalSteps as step}
                        <div class="goalStep">
                            <h4>Stap {step.id}</h4>
                            <!-- <p class="goalStep__title u-bold">{step.step}</p> -->
                            <p class="u-font-small goalStep__description">
                                {step.value}
                            </p>
                        </div>
                    {/each}
                </div>
            {/if}
        </section>
    {/if}
</article>

<style>
    article {
        font-size: var(--font-size-regular);
    }

    button {
        background-color: transparent;
        border: none;
        outline: none;
        padding: 0;
        margin: 0;
        color: white;
    }

    .steps {
        display: flex;
        gap: 1em;
    }

    .header__open {
        transition: 0.2s all ease-in-ease-out;
    }

    .header__open[data-open="true"] {
        transform: rotate(90deg);
    }

    h4:first {
        border-bottom: 1rem solid black;
    }
    .goal {
        background-color: #fff;
        border-radius: 1rem;
        width: 100%;
        min-width: 100%;
        grid-column: 1 / span 1;
        height: 100%;
        overflow: hidden;
        margin-bottom: 1em;
    }

    .goal__header {
        position: relative;
        background-color: #ddd;
        padding-right: 2rem;
    }

    .goal__header > h3 {
        display: flex;
        height: auto;
        padding-top: 3.5rem;
        padding-bottom: 1rem;
        padding-left: 1rem;
        font-size: 1.3rem;
    }
    .goal__toggle {
    }

    .goal__toggle:hover {
        background-color: var(--c-secondary-button-hover);
        cursor: pointer;
    }
    .open {
        height: fit-content;
    }

    .goal__body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        /* padding-top: 2rem; */
        margin: 0 2rem;
        gap: 1rem;
    }

    .goal__toggle {
        height: 3rem;
        width: 15rem;

        display: flex;
        justify-content: start;
        padding-left: 2rem;
        align-items: center;
        position: absolute;
        top: 0;
        left: 0;

        background-color: var(--c-nav-bg);
        color: var(--c-nav-font);
        border-radius: 1rem 0 1rem 0;
        font-size: 1.5rem;
    }

    .goalStep {
        border: 1px solid black;
        border-radius: 1rem;
        padding: 1rem;
    }

    .goalstep__title {
        font-weight: 700;
    }

    .goalStep__description {
        font-size: 1.4rem;
    }

    .u-bold {
        font-weight: 700;
    }
</style>
