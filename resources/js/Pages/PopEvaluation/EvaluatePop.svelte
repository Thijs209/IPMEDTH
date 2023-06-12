<script lang="ts">
    import { activeEvaluationTab, evaluationTabs } from "./../../stores.js";
    //Layouts
    import Layout from "./../../Layouts/Layout.svelte";
    import EvaluatePopLayout from "./../../Layouts/EvaluatePopLayout.svelte";
    // Page contents
    import UserProfile from "../../Components/EvaluatePopComponents/UserProfile.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import ProgressTabs from "./../../Components/EvaluatePopComponents/ProgressTabs.svelte";
    // Evaluation tabs
    import EvaluatePopProject from "./EvaluatePopProject.svelte";
    import EvaluatePopCoreQuadrants from "./EvaluatePopCoreQuadrants.svelte";

    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];

    interface Pop {
        id: number;
        name: string;
        description: string;
        user_id: number;
        created_at: string;
        updated_at: string;
        project: {
            description: {
                question: string;
                answer: string;
            };
            result: {
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
            additionalReportStakeholders: {
                question: string;
                answer: string;
            };
        };
        coreQuadrants: {
            quality: string;
            pitfall: string;
            challenge: string;
            allergy: string;
        };
        goals: {
            name: string;
            category: string;
            description: string;
        };
        learningGoals: {
            name: string;
            description: string;
            deadline: string;
            achieved: boolean;
        };
    }

    let currentPop: Pop = {
        id: 0,
        name: "Tony",
        description: "",
        user_id: 0,
        created_at: "",
        updated_at: "",
        project: {
            description: {
                question: "Wat is jouw opdracht en wat is het doel daarvan?",
                answer: "Ik moet een website maken voor een bedrijf.",
            },
            result: {
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
            additionalReportStakeholders: {
                question: "Rapporteer je nog naar anderen?",
                answer: "Nee, alleen naar Jeroen.",
            },
        },
        coreQuadrants: {
            quality: "Sterk verantwoordelijkheids gevoel",
            pitfall: "Overbelasting",
            allergy: "Snelle opgevers",
            challenge: "Rustmomenten vinden",
        },
        goals: {
            name: "Website maken",
            category: "Werk",
            description: "Een website maken voor een bedrijf.",
        },
        learningGoals: {
            name: "Leren werken met Vue",
            description:
                "Leren werken met Vue en het toepassen in een project.",
            deadline: "2021-06-01",
            achieved: false,
        },
    };
</script>

<Layout>
    <article slot="main" class="main">
        <CreatePageHeader {pages} currentPage={2} setCurrentPage={() => {}} />
        <EvaluatePopLayout>
            <section slot="evaluate-pop-profile" class="evaluate-pop__profile">
                <UserProfile />
            </section>
            <div slot="evaluate-pop-tabs" class="evaluate-pop__tabs">
                <ProgressTabs />
            </div>
            <section slot="evaluate-pop-content" class="evaluate-pop__content">
                {#if $activeEvaluationTab.tab === $evaluationTabs.tabs[0]}
                    <EvaluatePopProject popProject={currentPop.project} />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[1]}
                    <EvaluatePopCoreQuadrants
                        coreQuadrants={currentPop.coreQuadrants}
                    />
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[2]}
                    <!-- doelen -->
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[3]}
                    <!-- leerdoelen -->
                {:else if $activeEvaluationTab.tab === $evaluationTabs.tabs[4]}
                    <!-- afsluiting -->
                {/if}
            </section>
            <section slot="evaluate-pop-notes" class="evaluate-pop__notes">
                <!-- Notes weergave + input component -->
            </section>
            <div slot="evaluate-pop-buttons" class="evaluate-pop__buttons">
                <!-- Buttons = ['Sluiten', 'Opslaan'] -->
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
