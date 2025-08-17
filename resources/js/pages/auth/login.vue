<script lang="ts" setup>
import type { FormSubmitEvent } from '@nuxt/ui'
import login from '@/routes/login'
import { register } from '@/routes'
import password from '@/routes/password'
import auth from '@/routes/auth'

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
  onClick: () => {
    // Try direct navigation first
    window.location.href = auth.provider.redirect.get({ provider: 'google' }).url
  }
}, {
  label: 'GitHub',
  icon: 'i-simple-icons:github',
  onClick: () => {
    // Try direct navigation first
    window.location.href = auth.provider.redirect.get({ provider: 'github' }).url
  }
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
