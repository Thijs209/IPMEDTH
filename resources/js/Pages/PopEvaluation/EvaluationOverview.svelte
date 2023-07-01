<script lang="ts">
    import { evaluationLinks } from "./../../stores.js";
    import PopCards from "../../Components/EvaluatePopComponents/PopCards.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import PopArchive from "./../../Components/EvaluatePopComponents/PopArchive.svelte";
    import Layout from "./../../Layouts/Layout.svelte";

    interface Pop {
        userId: number;
        popId: number;
        userFinished: boolean;
        userFinishedAt: any;
        evaluatedBy: number;
        evaluationFinished: boolean;
        evaluationFinishedAt: any;
        user: User;
    }

    interface User {
        firstName: string;
        lastName: string;
        displayName: string;
        email: string;
    }

    export let pops: Pop[];
    console.log(pops);

    let finishedPops = pops.filter(
        (pop) => pop.userFinished === true && pop.evaluationFinishedAt !== null
    );

    let pageHeading = "POP Overzicht";
    let pages: string[] = ["Home", "POP Overzicht"];
</script>

<Layout>
    <article slot="main" class="evaluation-dashboard">
        <!-- <CreatePageHeader {pages} currentPage={1} setCurrentPage={() => {}} /> -->
        <CreatePageHeader
            setCurrentPage={() => {}}
            pages={[]}
            currentPage={1}
            evaluationSection
            evaluationPages={$evaluationLinks.overview}
        />
        <div class="cards-container">
            {#if pops && pops.length > 0}
                <PopCards {pops} />
            {/if}
        </div>
        <div class="archive-container">
            <PopArchive {finishedPops} />
        </div>
    </article>
</Layout>

<style>
    .evaluation-dashboard {
        font-size: 1.6rem;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
        height: 100%;
        min-height: 100%;
        padding: 1rem;
    }

    .cards-container {
        min-height: 30vh;
        width: 100%;
    }

    .archive-container {
        display: flex;
        width: 100%;
        min-height: 50vh;
    }
</style>
