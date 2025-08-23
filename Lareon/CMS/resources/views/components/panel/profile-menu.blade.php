<div class="flex justify-end gap-3">
    @if(!request()->routeIs('panel.profile.password.edit'))
        <x-lareon::link.btn-outline :href="route('panel.profile.password.edit')" :title="__('change password')" color="update" can="panel.profile.edit"/>
    @endif
    @if(!request()->routeIs('panel.profile.twofactor'))
        <x-lareon::link.btn-outline :href="route('panel.profile.twofactor')" :title="__('two factor auth')" color="update" can="panel.profile.towfactor"/>
    @endif
    @if(!request()->routeIs('panel.profile.edit'))
        <x-lareon::link.btn-outline :href="route('panel.profile.edit')" :title="__('profile')" color="update" can="panel.profile.edit"/>
    @endif
</div>
