<script lang="ts">

    import {
        activeEvaluationTab,
        evaluationTabs,
        evaluationLinks,
    } from "../../stores.js";
    //Layouts
    import EvaluatePopLayout from "./../../Layouts/EvaluatePopLayout.svelte";
    import Layout from "./../../Layouts/Layout.svelte";
    // Page contents
    import UserProfile from "../../Components/EvaluatePopComponents/UserProfile.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import ProgressTabs from "./../../Components/EvaluatePopComponents/ProgressTabs.svelte";
    // Evaluation tabs
    import EvaluatePopButtons from "../../Components/EvaluatePopComponents/EvaluatePopButtons.svelte";
    import PopNotes from "../../Components/EvaluatePopComponents/PopNotes.svelte";
    import EvaluatePopCoreQuadrants from "./EvaluatePopCoreQuadrants.svelte";
    import EvaluatePopFinalize from "./EvaluatePopFinalize.svelte";
    import EvaluatePopGoals from "./EvaluatePopGoals.svelte";
    import EvaluatePopProject from "./EvaluatePopProject.svelte";

    // let pages: string[] = ["Home", "POP Overzicht", "POP Review"];

    interface Pop {
        userId: number;
        id: number;
        userFinished: boolean;
        userFinishedAt: any;
        evaluatedBy: number;
        evaluationFinished: boolean;
        evaluationFinishedAt: any;
        tasks: any[];
        coreQuadrants: any[];
        goals: any[];
        evaluationNotes: any[];
        user: any;
    }

    interface CoreQuadrant {
        coreQuadrantId: string;
        allergy: string;
        challenge: string;
        coreQuality: string;
        pitfall: string;
    }

    export let pop: Pop;
    console.log(pop);

    console.log(pop.evaluationNotes);
</script>

<Layout>
    <article slot="main" class="main">
        <CreatePageHeader
            setCurrentPage={() => {}}
            pages={[]}
            currentPage={1}
            evaluationSection
            evaluationPages={$evaluationLinks.review}
        />
        <EvaluatePopLayout>
            <section slot="evaluate-pop-profile" class="evaluate-pop__profile">
                <UserProfile />
            </section>
            <div slot="evaluate-pop-tabs" class="evaluate-pop__tabs">
                <ProgressTabs />
            </div>
            <section slot="evaluate-pop-content" class="evaluate-pop__content">
                {#if $activeEvaluationTab.tab === $evaluationTabs.tabs[0]}
                    <EvaluatePopProject {pop} task={pop.tasks} />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[1]}
                    <EvaluatePopCoreQuadrants
                        {pop}
                        coreQuadrant={pop.coreQuadrants}
                    />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[2]}
                    <EvaluatePopGoals />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[3]}
                    <EvaluatePopFinalize />
                {/if}
            </section>
            <section slot="evaluate-pop-notes" class="evaluate-pop__notes">
                <PopNotes
                    popId={pop.id.toString()}
                    dbNotes={pop.evaluationNotes}
                />
            </section>
            <div slot="evaluate-pop-buttons" class="evaluate-pop__buttons">
                {#if $activeEvaluationTab != null && $activeEvaluationTab.tab !== $evaluationTabs.tabs[3]}
                    <EvaluatePopButtons finalize={false} />
                {:else}
                    <EvaluatePopButtons finalize={true} />
                {/if}
            </div>
        </EvaluatePopLayout>
    </article>
</Layout>

<style>
    .main {
        margin: 0 3rem;
    }

    .evaluate-pop__profile {
        height: 100%;
        width: 100%;
    }

    .evaluate-pop__tabs {
        height: 100%;
        width: 100%;
    }

    .evaluate-pop__notes {
        height: 100%;
        width: 100%;
        max-width: 30rem;
        min-width: 100%;

        display: flex;
        flex-direction: column;
    }
</style>
