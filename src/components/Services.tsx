import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { Clock, Star, ArrowRight } from 'lucide-react';

const Services = () => {
  const [activeCategory, setActiveCategory] = useState('facial');

  const categories = [
    { id: 'facial', name: 'Tratamentos Faciais' },
    { id: 'corporal', name: 'Tratamentos Corporais' },
    { id: 'estetica', name: 'Procedimentos Estéticos' },
    { id: 'relaxamento', name: 'Relaxamento' },
  ];

  const services = {
    facial: [
      {
        name: 'Limpeza de Pele Profunda',
        description: 'Tratamento completo para remoção de impurezas e renovação celular.',
        duration: '90 min',
        price: 'A partir de R$ 180',
        image: 'https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Remove impurezas', 'Renova a pele', 'Hidratação profunda']
      },
      {
        name: 'Peeling Químico',
        description: 'Renovação celular através de ácidos específicos para cada tipo de pele.',
        duration: '60 min',
        price: 'A partir de R$ 250',
        image: 'https://images.pexels.com/photos/3985162/pexels-photo-3985162.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Renovação celular', 'Reduz manchas', 'Melhora textura']
      },
      {
        name: 'Hidratação Facial Premium',
        description: 'Tratamento intensivo com ativos de alta performance para hidratação profunda.',
        duration: '75 min',
        price: 'A partir de R$ 220',
        image: 'https://images.pexels.com/photos/3757942/pexels-photo-3757942.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Hidratação intensa', 'Anti-idade', 'Luminosidade']
      }
    ],
    corporal: [
      {
        name: 'Drenagem Linfática',
        description: 'Técnica especializada para redução de inchaço e melhora da circulação.',
        duration: '60 min',
        price: 'A partir de R$ 150',
        image: 'https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Reduz inchaço', 'Melhora circulação', 'Detox corporal']
      },
      {
        name: 'Modelagem Corporal',
        description: 'Tratamento completo para definição e tonificação corporal.',
        duration: '90 min',
        price: 'A partir de R$ 280',
        image: 'https://images.pexels.com/photos/3985162/pexels-photo-3985162.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Define contornos', 'Reduz medidas', 'Tonifica músculos']
      }
    ],
    estetica: [
      {
        name: 'Microagulhamento',
        description: 'Estimulação natural do colágeno para rejuvenescimento da pele.',
        duration: '90 min',
        price: 'A partir de R$ 350',
        image: 'https://images.pexels.com/photos/3757942/pexels-photo-3757942.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Estimula colágeno', 'Reduz rugas', 'Melhora textura']
      },
      {
        name: 'Radiofrequência',
        description: 'Tecnologia avançada para firmeza e rejuvenescimento da pele.',
        duration: '60 min',
        price: 'A partir de R$ 300',
        image: 'https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Firma a pele', 'Reduz flacidez', 'Estimula colágeno']
      }
    ],
    relaxamento: [
      {
        name: 'Massagem Relaxante',
        description: 'Técnicas de massagem para alívio do stress e tensões musculares.',
        duration: '60 min',
        price: 'A partir de R$ 180',
        image: 'https://images.pexels.com/photos/3985162/pexels-photo-3985162.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Reduz stress', 'Relaxa músculos', 'Bem-estar geral']
      },
      {
        name: 'Aromaterapia',
        description: 'Tratamento holístico com óleos essenciais para equilíbrio e harmonia.',
        duration: '75 min',
        price: 'A partir de R$ 200',
        image: 'https://images.pexels.com/photos/3757942/pexels-photo-3757942.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop',
        benefits: ['Equilibra energias', 'Relaxamento profundo', 'Harmonia mental']
      }
    ]
  };

  return (
    <section id="services" className="py-20 bg-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Nossos Serviços</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            Tratamentos
            <span className="block text-gold-600">Exclusivos</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            Descubra nossa seleção de tratamentos personalizados, desenvolvidos para realçar sua beleza natural 
            e proporcionar momentos únicos de bem-estar.
          </p>
        </motion.div>

        {/* Category Tabs */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6 }}
          viewport={{ once: true }}
          className="flex flex-wrap justify-center gap-4 mb-12"
        >
          {categories.map((category) => (
            <motion.button
              key={category.id}
              className={`px-6 py-3 rounded-full font-medium transition-all duration-300 ${
                activeCategory === category.id
                  ? 'bg-gold-500 text-white shadow-lg'
                  : 'bg-cream-100 text-sage-700 hover:bg-cream-200'
              }`}
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.95 }}
              onClick={() => setActiveCategory(category.id)}
            >
              {category.name}
            </motion.button>
          ))}
        </motion.div>

        {/* Services Grid */}
        <AnimatePresence mode="wait">
          <motion.div
            key={activeCategory}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={{ duration: 0.5 }}
            className="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
          >
            {services[activeCategory as keyof typeof services].map((service, index) => (
              <motion.div
                key={index}
                className="bg-white rounded-2xl shadow-lg overflow-hidden border border-cream-200 hover:shadow-xl transition-all duration-300"
                whileHover={{ y: -5 }}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: index * 0.1, duration: 0.6 }}
              >
                <div className="relative overflow-hidden">
                  <img
                    src={service.image}
                    alt={service.name}
                    className="w-full h-48 object-cover transition-transform duration-300 hover:scale-110"
                  />
                  <div className="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                    <div className="flex items-center space-x-1 text-gold-600">
                      <Star size={14} fill="currentColor" />
                      <span className="text-sm font-medium">Premium</span>
                    </div>
                  </div>
                </div>

                <div className="p-6">
                  <h3 className="font-serif text-xl font-semibold text-sage-800 mb-2">
                    {service.name}
                  </h3>
                  <p className="text-sage-600 mb-4 leading-relaxed">
                    {service.description}
                  </p>

                  {/* Benefits */}
                  <div className="mb-4">
                    <h4 className="text-sm font-semibold text-sage-700 mb-2">Benefícios:</h4>
                    <div className="flex flex-wrap gap-2">
                      {service.benefits.map((benefit, idx) => (
                        <span
                          key={idx}
                          className="text-xs bg-sage-100 text-sage-700 px-2 py-1 rounded-full"
                        >
                          {benefit}
                        </span>
                      ))}
                    </div>
                  </div>

                  {/* Duration and Price */}
                  <div className="flex items-center justify-between mb-4">
                    <div className="flex items-center space-x-2 text-sage-600">
                      <Clock size={16} />
                      <span className="text-sm">{service.duration}</span>
                    </div>
                    <div className="text-gold-600 font-semibold">
                      {service.price}
                    </div>
                  </div>

                  {/* CTA Button */}
                  <motion.button
                    className="w-full bg-sage-100 hover:bg-sage-200 text-sage-700 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2 group"
                    whileHover={{ scale: 1.02 }}
                    whileTap={{ scale: 0.98 }}
                    onClick={() => document.querySelector('#booking')?.scrollIntoView({ behavior: 'smooth' })}
                  >
                    <span>Agendar Tratamento</span>
                    <ArrowRight className="group-hover:translate-x-1 transition-transform duration-200" size={16} />
                  </motion.button>
                </div>
              </motion.div>
            ))}
          </motion.div>
        </AnimatePresence>

        {/* CTA Section */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="mt-16 text-center bg-gradient-to-r from-cream-50 to-sage-50 rounded-2xl p-8"
        >
          <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-4">
            Não encontrou o que procura?
          </h3>
          <p className="text-sage-600 mb-6">
            Entre em contato conosco para uma consulta personalizada e descubra o tratamento ideal para você.
          </p>
          <motion.button
            className="bg-gold-500 hover:bg-gold-600 text-white px-8 py-3 rounded-full font-semibold transition-colors duration-200"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            onClick={() => document.querySelector('#contact')?.scrollIntoView({ behavior: 'smooth' })}
          >
            Falar com Especialista
          </motion.button>
        </motion.div>
      </div>
    </section>
  );
};

export default Services;