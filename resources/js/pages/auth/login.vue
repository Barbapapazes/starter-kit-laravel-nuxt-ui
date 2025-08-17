<script lang="ts" setup>
import type { FormSubmitEvent } from '@nuxt/ui'
import login from '@/routes/login'
import password from '@/routes/password'

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const fields = computed(() => [{
  name: 'email',
  type: 'text' as const,
  label: 'Email',
  placeholder: 'Enter your email',
  required: true,
  error: form.errors.email,
}, {
  name: 'password',
  label: 'Password',
  type: 'password' as const,
  placeholder: 'Enter your password',
}, {
  name: 'remember',
  label: 'Remember me',
  type: 'checkbox' as const,
}])

const providers = [{
  label: 'Google',
  icon: 'i-simple-icons:google',
  to: login.provider.redirect.get({ provider: 'google' })
}, {
  label: 'GitHub',
  icon: 'i-simple-icons:github',
  to: login.provider.redirect.get({ provider: 'github' })
}]

function onSubmit({ data }: FormSubmitEvent<typeof form>) {
  form.email = data.email
  form.password = data.password
  form.remember = data.remember

  form.submit(login.store())
}
</script>

<template>
  <Auth title="Login">
    <UAuthForm
      :fields="fields"
      :providers="providers"
      title="Welcome back"
      :loading="form.processing"
      icon="i-lucide-lock"
      @submit="onSubmit"
    >
      <template #description>
        Don't have an account? <ULink
          :to="register().url"
          class="text-primary font-medium"
        >
          Sign up
        </ULink>.
      </template>

      <template #password-hint>
        <ULink
          :to="password.request().url"
          class="font-medium"
          tabindex="-1"
        >
          Forgot password?
        </ULink>
      </template>

      <template #footer>
        By signing in, you agree to our <ULink
          to="/"
          class="text-primary font-medium"
        >
          Terms of Service
        </ULink>.
      </template>
    </UAuthForm>
  </Auth>
</template>
