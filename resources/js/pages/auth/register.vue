<script lang="ts" setup>
import type { FormSubmitEvent } from '@nuxt/ui'
import register from '@/routes/register'
import {login} from '@/routes'
import auth from '@/routes/auth'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const fields = computed(() => [{
  name: 'name',
  type: 'text' as const,
  label: 'Name',
  placeholder: 'Enter your name',
  error: form.errors.name,
}, {
  name: 'email',
  type: 'text' as const,
  label: 'Email',
  placeholder: 'Enter your email',
  error: form.errors.email,
}, {
  name: 'password',
  label: 'Password',
  type: 'password' as const,
  placeholder: 'Enter your password',
  error: form.errors.password,

}, {
  name: 'password_confirmation',
  label: 'Confirm Password',
  type: 'password' as const,
  placeholder: 'Confirm your password',
}])

const providers = [{
  label: 'Google',
  icon: 'i-simple-icons:google',
  to: auth.provider.redirect.get({ provider: 'google' }).url
}, {
  label: 'GitHub',
  icon: 'i-simple-icons:github',
  to: auth.provider.redirect.get({ provider: 'github' }).url
}]

function onSubmit({ data }: FormSubmitEvent<typeof form>) {
  form.name = data.name
  form.email = data.email
  form.password = data.password
  form.password_confirmation = data.password_confirmation

  form.submit(register.store())
}
</script>

<template>
  <Auth title="Sign up">
    <UAuthForm
      :fields="fields"
      :providers="providers"
      title="Create an account"
      :submit="{ label: 'Create account' }"
      :loading="form.processing"
      @submit="onSubmit"
    >
      <template #description>
        Already have an account? <ULink
          :to="login().url"
          class="text-primary font-medium"
        >
          Login
        </ULink>.
      </template>

      <template #footer>
        By signing up, you agree to our <ULink
          to="/"
          class="text-primary font-medium"
        >
          Terms of Service
        </ULink>.
      </template>
    </UAuthForm>
  </Auth>
</template>
