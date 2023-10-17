<x-auth-layout pageTitle="Dashboard">

    @hasrole('admin')
        <x-admin.pages.dashboard />
    @endhasrole

    @hasrole('customer')
        <x-user.pages.dashboard />
    @endhasrole

</x-auth-layout>
