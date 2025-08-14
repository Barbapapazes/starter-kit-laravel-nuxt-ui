<script lang="ts" setup>
const LazyStarsBg = defineAsyncComponent(() => import('@/components/StarsBg.vue'))
</script>

<template>
  <Default title="Build your SaaS with Laravel & Nuxt UI">
    <UPageHero
      title="Build your SaaS with Laravel & Nuxt UI"
      description="Nuxt UI Pro is a collection of premium Vue components built on top of Nuxt UI to create beautiful & responsive Nuxt applications in minutes. It includes all primitives to build landing pages, documentations, blogs, dashboards or entire SaaS products."
      :links="[
        {
          label: 'Get started',
          icon: 'i-lucide-arrow-right',
          trailing: true,
          to: 'https://ui.nuxt.com/getting-started/installation/pro/nuxt',
          target: '_blank',
          size: 'xl',
        },
        {
          label: 'Use this template',
          icon: 'i-simple-icons:github',
          size: 'xl',
          color: 'neutral',
          variant: 'subtle',
          to: 'https://github.com/nuxt-ui-pro/saas',
          target: '_blank',
        },
      ]"
    >
      <template #top>
        <div class="absolute rounded-full dark:bg-primary blur-[300px] size-60 sm:size-80 transform -translate-x-1/2 left-1/2 -translate-y-80" />

        <LazyStarsBg />
      </template>

      <PromotionalVideo />
    </UPageHero>

    <UPageSection
      title="Enterprise-Grade Solutions"
      description="Transform your business with our comprehensive suite of tools. Built for scale, security, and seamless integration, our platform empowers teams to achieve more while maintaining complete control."
      orientation="horizontal"
      :features="[
        {
          title: 'Developer-First',
          description: 'Built by developers for developers, with extensive API documentation and flexible integration options.',
          icon: 'i-lucide-cog',
        },
        {
          title: '99.9% Uptime',
          description: 'Enterprise-grade infrastructure with guaranteed reliability and automatic failover protection.',
          icon: 'i-lucide-check',
        },
        {
          title: 'Bank-Level Security',
          description: 'SOC 2 Type II certified with end-to-end encryption and advanced threat detection.',
          icon: 'i-lucide-lock',
        },
      ]"
    >
      <ImagePlaceholder />
    </UPageSection>

    <UPageSection
      title="Optimized for Growth"
      description="Scale your business confidently with our enterprise-ready platform. From startups to Fortune 500 companies, we provide the tools and support you need to succeed."
      orientation="horizontal"
      reverse
      :features="[
        {
          title: 'Lightning Fast',
          description: 'Global CDN with sub-100ms latency and automatic performance optimization.',
          icon: 'i-lucide-rocket',
        },
        {
          title: 'Predictable Pricing',
          description: 'Transparent, usage-based pricing with no hidden fees and volume discounts.',
          icon: 'i-lucide-circle-dollar-sign',
        },
        {
          title: 'Infinite Scale',
          description: 'Auto-scaling architecture handles millions of requests without breaking a sweat.',
          icon: 'i-lucide-chart-bar',
        },
      ]"
    >
      <ImagePlaceholder />
    </UPageSection>

    <UPageSection
      title="Features That Set Us Apart"
      description="Our platform combines enterprise-grade reliability with developer-friendly features, providing everything you need to build and scale your applications."
    >
      <UPageGrid>
        <UPageCard
          title="Developer Experience"
          description="Comprehensive documentation, powerful CLI tools, and intuitive APIs that make development a joy."
          icon="i-lucide-cog"
          spotlight
        />
        <UPageCard
          title="Enterprise Ready"
          description="SOC 2 Type II certified, GDPR compliant, with 24/7 enterprise support and dedicated success managers."
          icon="i-lucide-check"
        />
        <UPageCard
          title="Advanced Security"
          description="Multi-factor authentication, role-based access control, and audit logs keep your data protected."
          icon="i-lucide-lock"
        />
        <UPageCard
          title="Global Performance"
          description="Edge computing network spans 200+ locations ensuring lightning-fast response times worldwide."
          icon="i-lucide-rocket"
        />
        <UPageCard
          title="Flexible Pricing"
          description="Pay only for what you use with transparent pricing and no long-term commitments required."
          icon="i-lucide-circle-dollar-sign"
        />
        <UPageCard
          title="Infinite Scalability"
          description="Built on cloud-native architecture that automatically scales to meet any demand."
          icon="i-lucide-chart-bar"
        />
      </UPageGrid>
    </UPageSection>

    <UPageSection
      id="testimonials"
      headline="Customer Success Stories"
      title="Trusted by Industry Leaders"
      description="Join thousands of companies worldwide who have transformed their digital presence with our platform."
    >
      <UPageColumns class="xl:columns-4">
        <UPageCard
          variant="subtle"
          description="The developer experience is unmatched. We migrated our entire infrastructure in weeks instead of months, and our team\'s productivity has increased dramatically. The TypeScript support and component library saved us months of development time."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Sarah Chen"
              description="CTO at TechScale Solutions"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=1', alt: 'Sarah Chen' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="After implementing the edge computing features, our global application response times dropped by 70%. Our European and Asian markets saw immediate improvements in user engagement and conversion rates."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="David Lee"
              description="VP of Engineering at CloudInnovate"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=2', alt: 'David Lee' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="The platform's security features gave us peace of mind during our SOC 2 certification. The built-in compliance tools and audit logs made the process seamless."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Emily Johnson"
              description="CISO at SecureCorp"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=3', alt: 'Emily Johnson' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="During our Black Friday sale, we handled 15x our normal traffic without a hitch. The auto-scaling features worked flawlessly, and our monitoring dashboard gave us real-time insights throughout the event."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Michael Brown"
              description="Head of Infrastructure at RetailCorp"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=4', alt: 'Michael Brown' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="The support team goes above and beyond. They helped us optimize our CI/CD pipeline and suggested performance improvements that reduced our build times by 45%."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Laura Wilson"
              description="Head of DevOps at BuildIt"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=5', alt: 'Laura Wilson' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="Switching to this platform reduced our infrastructure costs by 40% while improving performance. The cost savings alone paid for the investment within the first quarter."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="David Lee"
              description="VP of Engineering at CloudInnovate"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=2', alt: 'David Lee' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="The accessibility features and responsive components helped us achieve WCAG 2.1 compliance with minimal custom development. Our site now scores 100 on Lighthouse accessibility metrics."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Emily Johnson"
              description="CISO at SecureCorp"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=3', alt: 'Emily Johnson' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="We serve millions of API requests daily, and the real-time analytics and monitoring tools have been invaluable for optimizing our performance and identifying bottlenecks."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Michael Brown"
              description="Head of Infrastructure at RetailCorp"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=4', alt: 'Michael Brown' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="The component library and design system tools helped us maintain consistency across our 20+ micro-frontends. Our development velocity has never been better."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="Laura Wilson"
              description="Head of DevOps at BuildIt"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=5', alt: 'Laura Wilson' }"
              size="lg"
            />
          </template>
        </UPageCard>
        <UPageCard
          variant="subtle"
          description="Integration with our existing tools was seamless. The webhooks and API documentation made it easy to automate our workflows and enhance our development pipeline."
          :ui="{ description: 'before:content-[open-quote] after:content-[close-quote]' }"
        >
          <template #footer>
            <UUser
              name="David Lee"
              description="VP of Engineering at CloudInnovate"
              :avatar="{ src: 'https://i.pravatar.cc/120?img=2', alt: 'David Lee' }"
              size="lg"
            />
          </template>
        </UPageCard>
      </UPageColumns>
    </UPageSection>

    <USeparator />

    <UPageCTA
      title="Start with Nuxt UI Pro today!"
      description="Nuxt UI Pro is free in development, but you need a license to use it in production."
      :links="[
        {
          label: 'Buy now',
          to: 'https://ui.nuxt.com/pro/purchase',
          target: '_blank',
          icon: 'i-lucide-shopping-cart',
        },
        {
          label: 'License',
          to: 'https://ui.nuxt.com/getting-started/license',
          trailingIcon: 'i-lucide-circle-help',
          target: '_blank',
          variant: 'subtle',
        },
      ]"
      variant="naked"
      class="overflow-hidden"
    >
      <div class="absolute rounded-full dark:bg-primary blur-[250px] size-40 sm:size-50 transform -translate-x-1/2 left-1/2 -translate-y-80" />

      <LazyStarsBg />
    </UPageCTA>
  </Default>
</template>
