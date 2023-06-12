<script lang="ts">
    import { evaluationTabs } from "./../../stores.js";
    import Layout from "./../../Layouts/Layout.svelte";
    import UserProfile from "../../Components/EvaluatePopComponents/UserProfile.svelte";
    import EvaluatePopLayout from "./../../Layouts/EvaluatePopLayout.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import ProgressTabs from "./../../Components/EvaluatePopComponents/ProgressTabs.svelte";

    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];

    interface FullPop {
        id: number;
        name: string;
        description: string;
        user_id: number;
        created_at: string;
        updated_at: string;
    }

    let pop: FullPop = {
        id: 0,
        name: "Tony",
        description: "",
        user_id: 0,
        created_at: "",
        updated_at: "",
    };
</script>

<Layout>
    <article slot="main" class="main">
        <CreatePageHeader {pages} currentPage={0} setCurrentPage={() => {}} />
        <EvaluatePopLayout>
            <div slot="evaluate-pop-profile" class="evaluate-pop__profile">
                <UserProfile name={pop.name} />
            </div>
            <div slot="evaluate-pop-tabs" class="evaluate-pop__tabs">
                <ProgressTabs /> 
            </div>
            <div slot="evaluate-pop-content" class="evaluate-pop__content">

            </div>
        </EvaluatePopLayout>
    </article>
</Layout>

<style>
    .main {
        margin: 1em;
        margin-left: 2rem;
    }

    .evaluate-pop__profile {
        height: 100%;
        width: 100%;
    }

    .evaluate-pop__tabs {
        height: 100%;
        width: 100%;
    }
</style>
