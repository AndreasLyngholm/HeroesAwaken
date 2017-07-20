<div class="tag dev" style="color: white; padding: 5px; margin: 5px auto; width: 80%; border-radius: 10px; background: radial-gradient(ellipse at center, #88332E 0%,#88332E 66%,#88332E 100%);">
    {{ \App\User::find($user_id)->roles->last()->title }}
</div>