<template>
    <div :class="$page.props.showingMobileMenu ? 'block' : 'hidden'" @click="$page.props.showingMobileMenu = false"
         class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

    <div :class="$page.props.showingMobileMenu ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
         class="overflow-y-auto fixed inset-y-0 right-0 z-30 w-64 bg-gray-900 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0">
        <ApplicationLogo :class="'text-white'"/>

        <!--side items-->
        <aside class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
            <nav-link :href="route('dashboard')" >
                <template #icon>
                    <ViewDashboardIcon/>
                </template>
                لوحة التحكم
            </nav-link>
            <nav-link :href="route('users.index')" >
                    <template #icon>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </template>
                    المستخدمين
            </nav-link>
            <NavegationDropDownItem
                :inner-text="'المتدربين'"
                :items="traineeItems"
            />
            <NavegationDropDownItem
                :inner-text="'البرامج التدريبية'"
                :items="courseItems"
            />
        </aside>
    </div>

</template>

<script>
import NavLink from '@/Components/NavLink.vue';
import {Link} from '@inertiajs/vue3';
import {ref} from 'vue'
import NavegationDropDownItem from "@/Components/NavegationDropDownItem.vue";
import ViewDashboardIcon from 'vue-material-design-icons/ViewDashboard.vue'
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

export default {
    components: {
        NavegationDropDownItem,
        NavLink,
        Link,
        ViewDashboardIcon,
        ApplicationLogo
    },

    setup() {

        let showingTwoLevelMenu = ref(false)
        let traineeItems = [
            {text: 'اضافة متدرب', route: 'trainee.create'},
            {text: 'عرض المتدربين', route: 'trainee.index'}
        ];
        let courseItems = [
            {text: 'اضافة برنامج تدريبي', route: 'program.create'},
            {text: 'عرض البرامج التدريبة', route: 'program.index'},
        ]

        return {
            showingTwoLevelMenu
            ,traineeItems
            ,courseItems
        }


    },
}
</script>

<style scoped>

</style>


