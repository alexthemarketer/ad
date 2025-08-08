import React from 'react';
import { motion } from 'framer-motion';
import { Award, Heart, Users, Sparkles } from 'lucide-react';

const About = () => {
  const stats = [
    { icon: Users, number: '5000+', label: 'Clientes Satisfeitos' },
    { icon: Award, number: '15+', label: 'Anos de Experiência' },
    { icon: Heart, number: '98%', label: 'Taxa de Satisfação' },
    { icon: Sparkles, number: '50+', label: 'Tratamentos Exclusivos' },
  ];

  return (
    <section id="about" className="py-20 bg-gradient-to-b from-cream-50 to-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Content */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
          >
            <div className="mb-6">
              <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Sobre a Serenity</span>
              <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
                Excelência em
                <span className="block text-gold-600">Cuidados Estéticos</span>
              </h2>
            </div>

            <div className="space-y-6 text-sage-600 leading-relaxed">
              <p className="text-lg">
                Há mais de 15 anos, a Serenity Clinic tem sido referência em tratamentos estéticos de alto padrão, 
                combinando técnicas avançadas com um ambiente de serenidade e sofisticação única.
              </p>
              
              <p>
                Nossa filosofia é baseada na crença de que cada pessoa possui uma beleza natural única. 
                Trabalhamos para realçar essa beleza através de tratamentos personalizados, sempre respeitando 
                a individualidade e os desejos de cada cliente.
              </p>

              <p>
                Com uma equipe de profissionais altamente qualificados e equipamentos de última geração, 
                oferecemos uma experiência completa de bem-estar e renovação em um ambiente acolhedor e luxuoso.
              </p>
            </div>

            {/* Values */}
            <div className="mt-8 grid grid-cols-2 gap-4">
              <div className="bg-white p-4 rounded-lg shadow-sm border border-cream-200">
                <h4 className="font-semibold text-sage-800 mb-2">Nossa Missão</h4>
                <p className="text-sm text-sage-600">Proporcionar experiências transformadoras através de cuidados estéticos personalizados.</p>
              </div>
              <div className="bg-white p-4 rounded-lg shadow-sm border border-cream-200">
                <h4 className="font-semibold text-sage-800 mb-2">Nossos Valores</h4>
                <p className="text-sm text-sage-600">Excelência, ética, inovação e respeito à individualidade de cada cliente.</p>
              </div>
            </div>
          </motion.div>

          {/* Image Grid */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8 }}
            viewport={{ once: true }}
            className="grid grid-cols-2 gap-4"
          >
            <div className="space-y-4">
              <img
                src="/src/assets/kag5o7qmrlnykibmmf2a.png"
                alt="Recepção da clínica"
                className="w-full h-48 object-cover rounded-lg shadow-lg"
              />
              <img
                src="https://images.pexels.com/photos/3757942/pexels-photo-3757942.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop"
                alt="Sala de tratamento"
                className="w-full h-32 object-cover rounded-lg shadow-lg"
              />
            </div>
            <div className="space-y-4 mt-8">
              <img
                src="https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop"
                alt="Ambiente relaxante"
                className="w-full h-32 object-cover rounded-lg shadow-lg"
              />
              <img
                src="https://images.pexels.com/photos/3985162/pexels-photo-3985162.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop"
                alt="Detalhes da decoração"
                className="w-full h-48 object-cover rounded-lg shadow-lg"
              />
            </div>
          </motion.div>
        </div>

        {/* Stats */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          viewport={{ once: true }}
          className="mt-20 grid grid-cols-2 lg:grid-cols-4 gap-8"
        >
          {stats.map((stat, index) => (
            <motion.div
              key={index}
              className="text-center"
              whileHover={{ y: -5 }}
              transition={{ duration: 0.2 }}
            >
              <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full mb-4">
                <stat.icon className="text-white" size={24} />
              </div>
              <div className="font-serif text-3xl font-bold text-sage-800 mb-2">{stat.number}</div>
              <div className="text-sage-600 text-sm">{stat.label}</div>
            </motion.div>
          ))}
        </motion.div>
      </div>
    </section>
  );
};

export default About;