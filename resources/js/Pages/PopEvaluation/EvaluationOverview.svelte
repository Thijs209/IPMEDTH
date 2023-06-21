<script lang="ts">
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
        tasks: any[];
        core_quadrants: any[];
        goals: any[];
        evaluation_notes: any[];
        user: any;
    }

    export let pops: Pop[];
    // export let usersData: User[] = [];

    let pageHeading = "POP Overzicht";
    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];
    // export let pops: Pop[] = [
    //     {
    //         userId: 1,
    //         popId: 1111,
    //         name: "John Doe",
    //         startDate: "01-01-2023",
    //         endDate: "01-01-2024",
    //         status: 2,
    //     },
    //     {
    //         userId: 4,
    //         popId: 1112,
    //         name: "Karin Tonneman",
    //         startDate: "01-01-2023",
    //         endDate: "01-06-2023",
    //         status: 1,
    //     },
    //     {
    //         userId: 3,
    //         popId: 1113,
    //         name: "Tom Mann",
    //         startDate: "01-01-2023",
    //         endDate: "01-05-2023",
    //         status: 3,
    //     },
    // ];
</script>

<Layout>
    <article slot="main" class="evaluation-dashboard">
        <CreatePageHeader {pages} currentPage={0} setCurrentPage={() => {}} />
        <div class="cards-container">
            {#if pops && pops.length > 0}
                <PopCards {pops} />
            {/if}
        </div>
        <div class="archive-container">
            <PopArchive />
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
